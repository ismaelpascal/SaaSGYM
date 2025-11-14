export default function initAddPlans() {
    
    const openBtnPlan = document.getElementById('addPlanTrigger');
    const closeBtnPlan = document.getElementById('addPlanClose');
    const cancelBtnPlan = document.getElementById('addPlanCancel');
    const addPlan = document.getElementById('addPlan');

    if (!openBtnPlan || !closeBtnPlan || !cancelBtnPlan || !addPlan) {
        return;
    }

    const openPopupPlan = () => addPlan.classList.remove('hidden');
    const closePopupPlan = () => addPlan.classList.add('hidden');

    openBtnPlan.addEventListener('click', openPopupPlan);
    closeBtnPlan.addEventListener('click', closePopupPlan);
    cancelBtnPlan.addEventListener('click', closePopupPlan);
}

