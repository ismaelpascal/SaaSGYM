const BASE_PATH = '/SaaSGYM/public';

export default function initAvailablePlans() {
    
    const plansContainer = document.getElementById('availablePlansContainer');

    if (!plansContainer) {
        return; 
    }
    
    loadAndRenderPlans(plansContainer);
}

async function loadAndRenderPlans(plansContainer) {

    try {
        const response = await fetch(`${BASE_PATH}/api/plans`);
        if (!response.ok) { throw new Error('Error de red'); }
        const plans = await response.json();

        plansContainer.innerHTML = ''; 

        if (plans.length === 0) {
            plansContainer.innerHTML = '<p class="text-gray-500">No hay planes disponibles.</p>';
            return;
        }

        plans.forEach(plan => {
            const precio = parseFloat(plan.precio).toLocaleString('es-AR', {
                style: 'currency',
                currency: 'ARS',
                maximumFractionDigits: 0 
            });

            const planHtml = `
                <div class="border p-4 rounded-lg bg-gray-50">
                    <h4 class="font-bold text-gray-900">
                        ${plan.nombre}
                    </h4>
                    <p class="text-sm text-gray-600">
                        Acceso por ${plan.duracion_dias} días.
                    </p>
                    <p class="text-lg font-bold text-right mt-2">
                        ${precio}
                    </p>
                </div>
            `;
            plansContainer.innerHTML += planHtml;
        });

    } catch (error) {
        console.error("Error al cargar planes:", error);
        plansContainer.innerHTML = '<p class="p-4 text-red-500">Error al cargar los planes.</p>';
    }
}