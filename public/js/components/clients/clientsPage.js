const BASE_PATH = '/SaaSGYM/public';

export default function initClientsPage() {
    
    const dataContainer = document.getElementById('clientInfoData');
    if (!dataContainer) {
        return;
    }

    document.addEventListener('clientSelected', (event) => {

        const memberId = event.detail.memberId;
        if (memberId) {
            loadClientInfo(memberId);
        }
    });
}

async function loadClientInfo(memberId) {
    
    const placeholder = document.getElementById('clientInfoPlaceholder');
    const dataContainer = document.getElementById('clientInfoData');

    console.log("Función loadClientInfo se ejecutó. ¿Encontró los elementos?", { placeholder, dataContainer });

    if (!placeholder || !dataContainer) { 
        console.error("¡ERROR! No se encontraron los divs 'clientInfoPlaceholder' o 'clientInfoData'. Revisa los IDs en clientInfo.php");
        return; 
    }

    placeholder.innerHTML = '<p class="text-gray-500">Cargando datos...</p>';
    placeholder.style.display = 'block';
    dataContainer.classList.add('hidden'); 

    try {
        const response = await fetch(`${BASE_PATH}/api/members/${memberId}`);
        if (!response.ok) {
            throw new Error('Respuesta de red no fue exitosa.');
        }
        const data = await response.json(); 

        console.log("Datos recibidos del fetch:", data);

        document.getElementById('clientInfoNombre').textContent = `${data.nombre} ${data.apellido}`;
        document.getElementById('clientInfoDni').textContent = data.dni || 'N/A';
        document.getElementById('clientInfoEmail').textContent = data.email || 'N/A';
        document.getElementById('clientInfoTelefono').textContent = data.telefono || 'N/A';
        document.getElementById('clientInfoEmergencia').textContent = data.contacto_emergencia || 'N/A';
        document.getElementById('clientInfoDomicilio').textContent = data.domicilio || 'N/A';

        document.getElementById('clientInfoFecNac').textContent = data.fecha_nacimiento 
            ? new Date(data.fecha_nacimiento + 'T00:00:00').toLocaleDateString('es-ES') 
            : 'N/A';
        document.getElementById('clientInfoFecReg').textContent = data.fecha_registro
            ? new Date(data.fecha_registro).toLocaleDateString('es-ES')
            : 'N/A';
        
        placeholder.style.display = 'none';
        dataContainer.classList.remove('hidden');

    } catch (error) {
        console.error("Error al cargar cliente:", error);
        placeholder.innerHTML = '<p class="text-red-500">Error al cargar los datos del cliente.</p>';
    }
}
