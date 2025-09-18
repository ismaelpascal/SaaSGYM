export default function initAddClients() {
    const openBtnClients = document.getElementById('addClientTrigger');
    const closeBtnClients = document.getElementById('addClientClose');
    const cancelBtnClients = document.getElementById('addClientCancel');
    const addClients = document.getElementById('addClient');

    const openPopupClients = () => addClients.classList.remove('hidden');
    const closePopupClients = () => addClients.classList.add('hidden');

    openBtnClients.addEventListener('click', openPopupClients);
    closeBtnClients.addEventListener('click', closePopupClients);
    cancelBtnClients.addEventListener('click', closePopupClients);
};