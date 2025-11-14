export default function initAddNotes() {
    const openBtnNote = document.getElementById('openNoteHistoryBtn');
    if (!openBtnNote) {
        return;
    }
    const closeBtnNote = document.getElementById('closeNoteHistoryBtn');
    const addNote = document.getElementById('noteHistoryModal');

    const openPopupNote = () => addNote.classList.remove('hidden');
    const closePopupNote = () => addNote.classList.add('hidden');

    openBtnNote.addEventListener('click', openPopupNote);
    closeBtnNote.addEventListener('click', closePopupNote);
};