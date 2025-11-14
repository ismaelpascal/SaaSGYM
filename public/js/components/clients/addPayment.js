const BASE_PATH = '/SaaSGYM/public';
let availablePlans = [];

export default function initAddPayment() {
    const modal = document.getElementById('addPaymentModal');
    const openBtn = document.getElementById('openPaymentModalBtn');
    const closeBtn = document.getElementById('closePaymentModalBtn');
    const cancelBtn = document.getElementById('cancelPaymentModalBtn');
    
    const paymentForm = document.getElementById('addPaymentForm');
    const planSelect = document.getElementById('paymentPlan');
    const amountInput = document.getElementById('paymentAmount');
    const submitButton = document.getElementById('confirmPaymentBtn');

    if (!modal || !openBtn || !closeBtn || !cancelBtn || !paymentForm || !planSelect || !amountInput || !submitButton) {
        return;
    }

    const openPopup = () => {
        loadPlansIntoSelect(planSelect, amountInput);
        modal.classList.remove('hidden');
    }
    const closePopup = () => modal.classList.add('hidden');

    openBtn.addEventListener('click', openPopup);
    closeBtn.addEventListener('click', closePopup);
    cancelBtn.addEventListener('click', closePopup);

    planSelect.addEventListener('change', () => {
        const selectedPlan = availablePlans.find(p => p.id == planSelect.value);
        if (selectedPlan) {
            amountInput.value = selectedPlan.precio;
        } else {
            amountInput.value = '';
        }
    });

    paymentForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const memberId = window.currentSelectedMemberId;
        if (!memberId) {
            alert('Error: No se ha seleccionado un cliente.');
            return;
        }

        submitButton.disabled = true;
        submitButton.textContent = 'Procesando...';

        try {
            const formData = new FormData(paymentForm);
            const data = {
                paymentPlan: formData.get('paymentPlan'),
                monto: formData.get('monto'),
                metodoPago: formData.get('metodoPago')
            };

            const response = await fetch(`${BASE_PATH}/api/members/${memberId}/payments`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Error al procesar el pago.');
            }

            alert('¡Pago registrado con éxito!');
            location.reload(); 

        } catch (error) {
            console.error('Error al registrar pago:', error);
            alert(`Error: ${error.message}`);
            submitButton.disabled = false;
            submitButton.textContent = 'Confirmar Pago';
        }
    });
}

async function loadPlansIntoSelect(planSelect, amountInput) {
    if (availablePlans.length > 0) {
        return;
    }

    try {
        const response = await fetch(`${BASE_PATH}/api/plans`);
        if (!response.ok) { throw new Error('Error de red'); }
        
        availablePlans = await response.json(); 

        planSelect.innerHTML = '<option value="">Selecciona un plan</option>';
        
        availablePlans.forEach(plan => {
            const precio = parseFloat(plan.precio).toLocaleString('es-AR', {
                style: 'currency',
                currency: 'ARS',
                maximumFractionDigits: 0
            });
            planSelect.innerHTML += `
                <option value="${plan.id}">${plan.nombre} - ${precio}</option>
            `;
        });
        
        if (availablePlans.length > 0) {
            planSelect.value = availablePlans[0].id;
            amountInput.value = availablePlans[0].precio;
        }

    } catch (error) {
        console.error("Error al cargar planes en el modal:", error);
        planSelect.innerHTML = '<option value="">Error al cargar planes</option>';
    }
}