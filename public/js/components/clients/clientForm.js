const BASE_PATH = '/SaaSGYM/public';

export default function initClientForm() {
    
    const clientForm = document.getElementById('addClientForm');

    if (!clientForm) {
        return;
    }

    clientForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const submitButton = document.getElementById('addClientSubmitBtn');
        submitButton.disabled = true;
        submitButton.textContent = 'Guardando...';

        try {
            const formData = new FormData(clientForm);
            
            const data = {
                nombre: formData.get('nombre'),
                apellido: formData.get('apellido'),
                email: formData.get('gmail'),
                dni: formData.get('dni'),
                fecha_nacimiento: formData.get('fechaNac'),
                telefono: formData.get('telefono'),
                contacto_emergencia: formData.get('contactoEmergencia') || null,
                domicilio: formData.get('domicilio') || null
            };

            const response = await fetch(`${BASE_PATH}/api/members`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Error al crear el cliente.');
            }

            alert('¡Cliente creado con éxito!');
            
            location.reload();

        } catch (error) {
            console.error('Error en el formulario:', error);
            alert(`Error: ${error.message}`);
            submitButton.disabled = false;
            submitButton.textContent = 'Guardar Cliente';
        }
    });
}