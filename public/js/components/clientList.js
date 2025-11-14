const BASE_PATH = '/SaaSGYM/public';

window.currentSelectedMemberId = null;

export default function initClientList() {
    
    const listContainer = document.getElementById('clientListContainer');
    
    if (!listContainer) {
        return;
    }
    loadAndRenderMembers(listContainer);

    listContainer.addEventListener('click', (e) => {
        const clientLink = e.target.closest('.client-list-item');

        if (clientLink) {
            e.preventDefault();
            
            highlightSelectedClient(clientLink);

            dispatchClientSelectedEvent(clientLink);

            window.currentSelectedMemberId = clientLink.dataset.memberId;
        }
    });
}

async function loadAndRenderMembers(listContainer) {
    try {
        const response = await fetch(`${BASE_PATH}/api/members`);
        if (!response.ok) { throw new Error('Error de red'); }
        const members = await response.json();

        listContainer.innerHTML = '';

        if (members.length === 0) {
            listContainer.innerHTML = '<p class="p-4 text-gray-500">No se encontraron miembros.</p>';
            return;
        }

        members.forEach(member => {
            let statusText = 'Sin Plan';
            let statusClass = 'text-gray-500';
            if (member.estado) {
                statusText = member.estado.charAt(0).toUpperCase() + member.estado.slice(1);
                if (member.estado === 'activo') {
                    statusClass = 'text-green-600';
                } else if (member.estado === 'vencido') {
                    statusClass = 'text-red-600';
                }
            }
            const planText = member.plan_nombre || 'N/A';
            const bgClass = 'hover:bg-gray-50';

            const memberHtml = `
                <a href="#" 
                   class="block p-4 border-b border-gray-200 ${bgClass} client-list-item"
                   data-member-id="${member.id}">
                    
                    <p class="font-semibold">${member.nombre} ${member.apellido}</p>
                    <p class="text-sm text-gray-500">
                        ${planText} - <span class="font-semibold ${statusClass}">${statusText}</span>
                    </p>
                </a>
            `;
            listContainer.innerHTML += memberHtml;
        });

    } catch (error) {
        console.error("Error al cargar la lista de clientes:", error);
        listContainer.innerHTML = '<p class="p-4 text-red-500">Error al cargar la lista.</p>';
    }
}

function highlightSelectedClient(selectedLink) {
    const allClientLinks = document.querySelectorAll('.client-list-item');
    allClientLinks.forEach(link => {
        link.classList.remove('bg-blue-100');
        link.classList.remove('hover:bg-blue-100');
    });
    selectedLink.classList.add('bg-blue-100');
    selectedLink.classList.add('hover:bg-blue-100');
}

function dispatchClientSelectedEvent(clientLink) {
    const memberId = clientLink.dataset.memberId;
    const clientSelectedEvent = new CustomEvent('clientSelected', {
        detail: { memberId: memberId }
    });
    document.dispatchEvent(clientSelectedEvent);
}