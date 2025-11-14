/**
 * initClientSearch
 * Responsabilidad: Escuchar el input de búsqueda y filtrar la
 * lista de clientes que generó 'clientList.js'.
 */
export default function initClientSearch() {
    
    const searchInput = document.getElementById('clientSearchInput');
    // Este es el ID del <div> que creamos en clientList.php
    const listContainer = document.getElementById('clientListContainer');

    // --- Barrera de Seguridad ---
    if (!searchInput || !listContainer) {
        // Si no está el buscador o la lista, no hacemos nada
        return;
    }
    // --- Fin Barrera ---

    // 'input' se dispara con cada tecla que presionas
    searchInput.addEventListener('input', (e) => {
        // Obtiene el texto de búsqueda y lo pone en minúsculas
        const searchTerm = e.target.value.toLowerCase();
        
        // Llama a la función que filtra
        filterClientList(searchTerm, listContainer);
    });
}

/**
 * Filtra los clientes en la lista
 * @param {string} searchTerm - El texto a buscar
 * @param {HTMLElement} listContainer - El <div> que contiene los clientes
 */
function filterClientList(searchTerm, listContainer) {
    
    // Obtenemos a todos los clientes (los <a> con clase .client-list-item)
    const clients = listContainer.querySelectorAll('.client-list-item');

    clients.forEach(client => {
        
        // Obtenemos el texto del nombre (ej: "Nombre1 Apellido1")
        // (Usamos 'p.font-semibold' porque así está en el HTML de clientList.js)
        const nameElement = client.querySelector('p.font-semibold');
        const name = nameElement.textContent.toLowerCase();

        // Comparamos el nombre con la búsqueda
        if (name.includes(searchTerm)) {
            client.style.display = 'block'; // Mostrar
        } else {
            client.style.display = 'none';  // Ocultar
        }
    });
}