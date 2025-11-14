const BASE_PATH = '/SaaSGYM/public';

export default function initSalesStats() {

    const totalCountElement = document.getElementById('productTotalCount');
    if (totalCountElement) {
        loadProductCount(totalCountElement);
    }

    const pendingCountElement = document.getElementById('pendingSalesCount');
    if (pendingCountElement) {
        loadPendingSalesCount(pendingCountElement);
    }
}

function loadProductCount(totalCountElement) {
    fetch(`${BASE_PATH}/api/products`)
        .then(response => response.json())
        .then(products => {
            totalCountElement.textContent = products.length;
        });
}

function loadPendingSalesCount(pendingCountElement) {
    fetch(`${BASE_PATH}/api/sales/pending`)
        .then(response => response.json())
        .then(sales => {
            pendingCountElement.textContent = sales.length;
        });
}