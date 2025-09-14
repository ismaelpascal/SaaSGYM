export default function initAddNotes() {
    const openBotNote = document.getElementById('openNoteHistoryBtn');
    const closeBotNote = document.getElementById('closeNoteHistoryBtn');
    const addNote = document.getElementById('noteHistoryModal');

    const openPopupNote = () => addNote.classList.remove('hidden');
    
    const closePopupNote = () => addNote.classList.add('hidden');

    openBotNote.addEventListener('click', openPopupNote);
    closeBotNote.addEventListener('click', closePopupNote);
};