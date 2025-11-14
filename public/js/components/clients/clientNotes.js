const BASE_PATH = '/SaaSGYM/public';

/**
 * initClientNotesLoader
 * Responsabilidad: Escuchar el evento 'clientSelected' y
 * cargar el historial de notas del cliente en el modal.
 */
export default function initClientNotes() {
    
    const list = document.getElementById('noteHistoryList');
    if (!list) {
        return; 
    }
    
    // 2. Si existe, se pone a escuchar
    document.addEventListener('clientSelected', (event) => {
        const memberId = event.detail.memberId;
        if (memberId) {
            loadClientNotes(memberId);
        }
    });
}

/**
 * Carga las NOTAS del cliente desde la API
 * (Versión corregida que NO destruye el placeholder)
 * @param {string} memberId - El ID del miembro a buscar.
 */
export async function loadClientNotes(memberId) {
    
    // 3. Solo necesitamos el 'div' contenedor
    const list = document.getElementById('noteHistoryList');
    if (!list) { 
        return; 
    }

    // 4. Escribe "Cargando..." directamente en el 'div'
    list.innerHTML = '<p class="text-gray-500">Cargando notas...</p>';

    try {
        // 5. Llama a tu API de notas
        const response = await fetch(`${BASE_PATH}/api/members/${memberId}/notes`);
        if (!response.ok) { throw new Error('Error de red'); }
        const notes = await response.json();

        // 6. Limpia el "Cargando..."
        list.innerHTML = ''; 

        // 7. Renderiza los datos
        if (notes.length === 0) {
            list.innerHTML = '<p class="text-gray-500">Este cliente no tiene notas.</p>';
        } else {
            notes.forEach(note => {
                const date = new Date(note.created_at).toLocaleDateString('es-ES');
                list.innerHTML += `
                    <div class="p-4 border rounded-lg flex justify-between items-start">
                        <div>
                            <p class="text-gray-700">${note.note}</p>
                            <span class="text-xs text-gray-400">${date} - Admin</span>
                        </div>
                        <div class="flex items-center space-x-2 flex-shrink-0 ml-4">
                            <button class="text-gray-500 hover:text-blue-600">Editar</button>
                            <button class="text-gray-500 hover:text-red-600">Eliminar</button>
                        </div>
                    </div>
                `;
            });
        }
    } catch (error) {
        console.error("Error al cargar notas:", error);
        list.innerHTML = '<p class="text-red-500">Error al cargar las notas.</p>';
    }
}