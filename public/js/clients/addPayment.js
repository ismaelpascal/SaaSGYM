// Exportamos la función para que main.js pueda importarla
export default function initAddPayment() {

    const openBtn = document.getElementById('openPaymentModalBtn');
    const closeBtn = document.getElementById('closePaymentModalBtn');
    const cancelBtn = document.getElementById('cancelPaymentModalBtn');
    const modal = document.getElementById('addPaymentModal');

    // Si los elementos no existen en la página, no hacemos nada
    if (!openBtn || !closeBtn || !cancelBtn || !modal) {
        return;
    }

    const openPopup = () => modal.classList.remove('hidden');
    const closePopup = () => modal.classList.add('hidden');

    openBtn.addEventListener('click', openPopup);
    closeBtn.addEventListener('click', closePopup);
    cancelBtn.addEventListener('click', closePopup);
}
