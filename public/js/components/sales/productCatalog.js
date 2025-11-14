const BASE_PATH = '/SaaSGYM/public';

let allProducts = [];

export default function initProductCatalog() {
    
    const productGrid = document.getElementById('productGrid');
    const categoriesContainer = document.getElementById('productCategories');

    if (!productGrid || !categoriesContainer) {
        return;
    }

    loadCatalogData(productGrid, categoriesContainer);

    categoriesContainer.addEventListener('click', (e) => {
        e.preventDefault();
        const categoryLink = e.target.closest('a');
        
        if (categoryLink) {
            const category = categoryLink.dataset.category;
            
            filterProducts(category, productGrid);
            
            highlightActiveCategory(categoryLink, categoriesContainer);
        }
    });
}

async function loadCatalogData(productGrid, categoriesContainer) {
    try {
        const response = await fetch(`${BASE_PATH}/api/products`);
        if (!response.ok) { throw new Error('Error de red'); }
        
        allProducts = await response.json();

        renderCategories(allProducts, categoriesContainer);
        
        renderProducts(allProducts, productGrid);

    } catch (error) {
        console.error("Error al cargar el catálogo:", error);
        productGrid.innerHTML = '<p class="text-red-500 col-span-full">Error al cargar productos.</p>';
        categoriesContainer.innerHTML = '';
    }
}

function renderCategories(products, categoriesContainer) {
    const categories = [...new Set(products.map(p => p.categoria))];
    
    categoriesContainer.innerHTML = '';
    
    categoriesContainer.innerHTML += `
        <a href="#" class="py-2 px-4 rounded-md text-sm font-medium bg-blue-100 text-blue-700" data-category="Todos">
            Todos
        </a>
    `;
    
    categories.forEach(category => {
        if (category) {
            categoriesContainer.innerHTML += `
                <a href="#" class="py-2 px-4 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100" data-category="${category}">
                    ${category}
                </a>
            `;
        }
    });
}

function renderProducts(products, productGrid) {
    productGrid.innerHTML = '';

    if (products.length === 0) {
        productGrid.innerHTML = '<p class="text-gray-500 col-span-full">No hay productos.</p>';
        return;
    }

    products.forEach(product => {
        const precio = parseFloat(product.precio).toLocaleString('es-AR', {
            style: 'currency',
            currency: 'ARS',
            maximumFractionDigits: 0
        });

        const productHtml = `
            <button class="bg-white p-3 rounded-lg shadow text-center hover:shadow-lg transition-shadow" 
                    data-category="${product.categoria}">
                <span class="block text-sm font-semibold text-gray-800">${product.nombre}</span>
                <span class="block text-xs text-gray-500">${precio}</span>
            </button>
        `;
        productGrid.innerHTML += productHtml;
    });
}

function filterProducts(category, productGrid) {
    const products = productGrid.querySelectorAll('button');
    
    products.forEach(product => {
        if (category === 'Todos' || product.dataset.category === category) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

function highlightActiveCategory(activeLink, categoriesContainer) {
    const allLinks = categoriesContainer.querySelectorAll('a');
    
    allLinks.forEach(link => {
        link.classList.remove('bg-blue-100', 'text-blue-700');
        link.classList.add('text-gray-500', 'hover:bg-gray-100');
    });
    
    activeLink.classList.add('bg-blue-100', 'text-blue-700');
    activeLink.classList.remove('text-gray-500', 'hover:bg-gray-100');
}