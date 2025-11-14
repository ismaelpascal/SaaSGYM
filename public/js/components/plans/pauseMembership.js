const BASE_PATH = '/SaaSGYM/public';

export default function initPauseMembership() {
    
    const dataContainer = document.getElementById('pauseMembershipData');
    if (!dataContainer) {
        return;
    }
    document.addEventListener('clientSelected', (event) => {
        const memberId = event.detail.memberId;
        if (memberId) {
            loadMembershipData(memberId);
        }
    });
}

async function loadMembershipData(memberId) {
    
    const dataContainer = document.getElementById('pauseMembershipData');
    const placeholder = document.getElementById('pauseMembershipPlaceholder');

    if (!dataContainer || !placeholder) { return; } 

    placeholder.innerHTML = '<p class="text-gray-500">Cargando membresía...</p>';
    placeholder.style.display = 'block';
    dataContainer.classList.add('hidden');

    try {
        const response = await fetch(`${BASE_PATH}/api/members/${memberId}`);
        if (!response.ok) { throw new Error('Error de red'); }
        const data = await response.json(); 

        document.getElementById('pauseMembershipNombre').textContent = `${data.nombre} ${data.apellido}`;
        document.getElementById('pauseMembershipDni').textContent = data.dni || 'N/A';
        document.getElementById('pauseMembershipEmail').textContent = data.email || 'N/A';
        document.getElementById('pauseMembershipTelefono').textContent = data.telefono || 'N/A';
        
        document.getElementById('pauseMembershipPlan').textContent = data.plan_nombre || 'Sin Plan Activo';
        document.getElementById('pauseMembershipVencimiento').textContent = data.fecha_vencimiento
            ? new Date(data.fecha_vencimiento + 'T00:00:00').toLocaleDateString('es-ES') 
            : 'N/A';

        placeholder.style.display = 'none';
        dataContainer.classList.remove('hidden');

    } catch (error) {
        console.error("Error al cargar membresía:", error);
        placeholder.innerHTML = '<p class="text-red-500">Error al cargar los datos.</p>';
        placeholder.style.display = 'block';
        dataContainer.classList.add('hidden');
    }
}