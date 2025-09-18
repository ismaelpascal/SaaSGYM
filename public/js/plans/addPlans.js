// Exportamos la función para que main.js pueda importarla
export default function initAddPlans() {
    
    // 1. Seleccionamos los elementos por su ID
    const openBtnPlan = document.getElementById('addPlanTrigger');
    const closeBtnPlan = document.getElementById('addPlanClose');
    const cancelBtnPlan = document.getElementById('addPlanCancel');
    const addPlan = document.getElementById('addPlan');

    // Si los elementos no existen en la página, no hacemos nada
    if (!openBtnPlan || !closeBtnPlan || !cancelBtnPlan || !addPlan) {
        return;
    }

    // 2. Creamos las funciones para abrir y cerrar
    const openPopupPlan = () => addPlan.classList.remove('hidden');
    const closePopupPlan = () => addPlan.classList.add('hidden');

    // 3. Asignamos los eventos a los botones
    openBtnPlan.addEventListener('click', openPopupPlan);
    closeBtnPlan.addEventListener('click', closePopupPlan);
    cancelBtnPlan.addEventListener('click', closePopupPlan);
}

