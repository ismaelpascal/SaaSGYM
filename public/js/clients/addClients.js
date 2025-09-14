export default function initAddClients() {
    const openBotClients = document.getElementById('addClientTrigger');
    const closeBotClients = document.getElementById('addClientClose');
    const cancelBotClients = document.getElementById('addClientCancel');
    const addClients = document.getElementById('addClient');

    const openPopupClients = () => addClients.classList.remove('hidden');
    
    const closePopupClients = () => addClients.classList.add('hidden');

    openBotClients.addEventListener('click', openPopupClients);
    closeBotClients.addEventListener('click', closePopupClients);
    cancelBotClients.addEventListener('click', closePopupClients);
};