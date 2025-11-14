const BASE_PATH = '/SaaSGYM/public';

export default function initPendingSales() {
    
    const container = document.getElementById('pendingSalesContainer');

    if (!container) {
        return;
    }

    loadPendingSales(container);
}

async function loadPendingSales(container) {
    try {
        const response = await fetch(`${BASE_PATH}/api/sales/pending`);
        if (!response.ok) { throw new Error('Error de red'); }
        const sales = await response.json();

        container.innerHTML = '';

        if (sales.length === 0) {
            container.innerHTML = '<p class="text-gray-500">No hay ventas pendientes de retiro.</p>';
            return;
        }

        const currencyFormatter = new Intl.NumberFormat('es-AR', {
            style: 'currency',
            currency: 'ARS'
        });

        sales.forEach(sale => {
            const saleDate = new Date(sale.fecha_venta).toLocaleDateString('es-ES');
            const total = currencyFormatter.format(sale.total);
            const memberName = (sale.nombre) ? `${sale.nombre} ${sale.apellido}` : 'Cliente Ocasional';
            const memberEmail = sale.email || '';

            let itemsHtml = '';
            sale.items.forEach(item => {
                const itemSubtotal = currencyFormatter.format(item.precio_unitario * item.cantidad);
                itemsHtml += `
                    <li class="flex justify-between">
                        <span>${item.cantidad}x ${item.producto_nombre}</span> 
                        <span class="font-mono">${itemSubtotal}</span>
                    </li>
                `;
            });

            const saleHtml = `
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Orden #${sale.id} - ${saleDate}</p>
                            <h3 class="text-xl font-bold text-gray-800">${memberName}</h3>
                            ${memberEmail ? `<p class="text-gray-600">${memberEmail}</p>` : ''}
                        </div>
                        <span class="text-sm font-semibold text-orange-600 bg-orange-100 py-1 px-3 rounded-full">Pendiente de Retiro</span>
                    </div>
                    <div class="border-t my-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Productos:</h4>
                        <ul class="space-y-1 text-sm text-gray-600">
                            ${itemsHtml}
                        </ul>
                    </div>
                    <div class="border-t my-4"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Total: ${total}</span>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 font-semibold" data-sale-id="${sale.id}">
                            Marcar como Entregado
                        </button>
                    </div>
                </div>
            `;
            container.innerHTML += saleHtml;
        });

    } catch (error) {
        console.error("Error al cargar ventas pendientes:", error);
        container.innerHTML = '<p class="text-red-500">Error al cargar las ventas.</p>';
    }
}