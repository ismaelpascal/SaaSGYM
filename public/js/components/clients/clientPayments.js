const BASE_PATH = '/SaaSGYM/public';

export default function initClientPayments() {
    const list = document.getElementById('paymentHistoryList');
    if (!list) {
        return; 
    }
    
    document.addEventListener('clientSelected', (event) => {
        const memberId = event.detail.memberId;
        if (memberId) {
            loadPaymentHistory(memberId);
        }
    });
}

async function loadPaymentHistory(memberId) {
    const list = document.getElementById('paymentHistoryList');
    const cobrarBtn = document.getElementById('openPaymentModalBtn');
    if (!list || !cobrarBtn) { 
        return; 
    } 

    list.innerHTML = '<li class="text-gray-500">Cargando historial...</li>';
    cobrarBtn.classList.add('hidden');

    try {
        const response = await fetch(`${BASE_PATH}/api/members/${memberId}/payments`);
        if (!response.ok) { throw new Error('Error de red'); }
        const payments = await response.json();

        list.innerHTML = ''; 

        if (payments.length === 0) {
            list.innerHTML = '<li class="text-gray-500">Este cliente no tiene pagos registrados.</li>';
        } else {
            const currencyFormatter = new Intl.NumberFormat('es-AR', {
                style: 'currency',
                currency: 'ARS'
            });
            payments.forEach(payment => {
                const date = new Date(payment.fecha_pago).toLocaleDateString('es-ES');
                const plan = payment.plan_nombre || 'Pago'; 
                const metodo = payment.metodo_pago;
                const amount = currencyFormatter.format(payment.monto);
                
                list.innerHTML += `
                    <li class="flex justify-between py-1">
                        <span class="text-gray-600">${date} - ${plan} (${metodo})</span>
                        <span class="font-mono">${amount}</span>
                    </li>
                `;
            });
        }
        
        cobrarBtn.classList.remove('hidden');

    } catch (error) {
        console.error("Error al cargar pagos:", error);
        list.innerHTML = '<li class="text-red-500">Error al cargar los pagos.</li>';
    }
}