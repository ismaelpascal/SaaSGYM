import { loadClientNotes } from './clientNotes.js';

const BASE_PATH = '/SaaSGYM/public';

export default function initClientNoteForm() {
    
    const saveButton = document.getElementById('saveClientNoteBtn');
    const noteTextarea = document.getElementById('newClientNoteText');

    if (!saveButton || !noteTextarea) {
        return;
    }

    saveButton.addEventListener('click', async () => {
        
        const memberId = window.currentSelectedMemberId;
        if (!memberId) {
            alert('Por favor, selecciona un cliente primero.');
            return;
        }

        const noteText = noteTextarea.value;
        if (!noteText.trim()) {
            alert('Por favor, escribe una nota.');
            return;
        }

        saveButton.disabled = true;
        saveButton.textContent = 'Guardando...';

        try {
            const response = await fetch(`${BASE_PATH}/api/members/${memberId}/notes`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ note: noteText })
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Error al guardar la nota.');
            }

            alert('¡Nota guardada!');
            noteTextarea.value = '';

            loadClientNotes(memberId);

        } catch (error) {
            console.error('Error al guardar nota:', error);
            alert(`Error: ${error.message}`);
        } finally {
            saveButton.disabled = false;
            saveButton.textContent = 'Guardar Nota';
        }
    });
}