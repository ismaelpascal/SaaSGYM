const BASE_PATH = '/SaaSGYM/public';

export default function initInventory() {
    
    const tableBody = document.getElementById('inventoryTableBody');

    if (!tableBody) {
        return;
    }
    loadAndRenderInventory(tableBody);
}

async function loadAndRenderInventory(tableBody) {
    try {
        const response = await fetch(`${BASE_PATH}/api/products`);
        if (!response.ok) { throw new Error('Error de red'); }
        const products = await response.json();

        tableBody.innerHTML = '';

        if (products.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        No se encontraron productos.
                    </td>
                </tr>
            `;
            return;
        }

        products.forEach(product => {
            const precio = parseFloat(product.precio).toLocaleString('es-AR', {
                style: 'currency',
                currency: 'ARS'
            });

            const stockClass = (product.stock > 10) 
                ? 'bg-green-100 text-green-800' 
                : 'bg-red-100 text-red-800';

            const productHtml = `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        ${product.nombre}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${product.categoria}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${stockClass}">
                            ${product.stock} Unidades
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        ${precio}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Eliminar</a>
                    </td>
                </tr>
            `;
            tableBody.innerHTML += productHtml;
        });

    } catch (error) {
        console.error("Error al cargar inventario:", error);
        tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-4 text-red-500">
                    Error al cargar el inventario.
                </td>
            </tr>
        `;
    }
}