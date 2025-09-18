export default function initAddPayment() {
    const openBtnPayment = document.getElementById('openPaymentModalBtn');
    const closeBtnPayment = document.getElementById('closePaymentModalBtn');
    const cancelBtnPayment = document.getElementById('cancelPaymentModalBtn');
    const addPayment = document.getElementById('addPaymentModal');

    const openPopupPayment = () => addPayment.classList.remove('hidden');
    const closePopupPayment = () => addPayment.classList.add('hidden');

    openBtnPayment.addEventListener('click', openPopupPayment);
    closeBtnPayment.addEventListener('click', closePopupPayment);
    cancelBtnPayment.addEventListener('click', closePopupPayment);
}
