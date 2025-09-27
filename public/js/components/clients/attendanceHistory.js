export default function initAttendanceHistory() {
    // Elementos del DOM con IDs en camelCase
    const monthYearDisplay = document.getElementById('../calendarMonthYear');
    const calendarGrid = document.getElementById('../calendarGrid');
    const prevMonthBtn = document.getElementById('../prevMonthBtn');
    const nextMonthBtn = document.getElementById('../nextMonthBtn');

    // Estado del calendario
    let currentDate = new Date();

    // (Simulación de datos) Las asistencias del cliente. 
    // En el futuro, estos datos vendrían de una base de datos.
    const asistencias = {
        '2025-8': [3, 5, 6, 10, 12, 13, 17, 19, 20], // Asistencias de Septiembre 2025
        '2025-7': [1, 4, 8, 15, 16, 23, 30],         // Asistencias de Agosto 2025
    };

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth(); // 0-11

        // Configurar el nombre del mes en español
        const monthName = new Intl.DateTimeFormat('es-ES', { month: 'long' }).format(currentDate);
        monthYearDisplay.textContent = `${monthName.charAt(0).toUpperCase() + monthName.slice(1)} ${year}`;
        
        // Limpiar el calendario anterior
        calendarGrid.innerHTML = '';

        // Calcular los días del mes y el primer día de la semana
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        let firstDayOfWeek = new Date(year, month, 1).getDay();
        if (firstDayOfWeek === 0) firstDayOfWeek = 7; // Ajuste para que Lunes sea 1 y Domingo 7

        // Añadir celdas vacías al principio
        for (let i = 1; i < firstDayOfWeek; i++) {
            calendarGrid.innerHTML += '<div></div>';
        }

        // Obtener asistencias para el mes actual
        const diasAsistidos = asistencias[`${year}-${month}`] || [];

        // Crear las celdas de los días
        for (let day = 1; day <= daysInMonth; day++) {
            const today = new Date();
            const esHoy = (day === today.getDate() && month === today.getMonth() && year === today.getFullYear());
            
            let claseFondo = 'bg-gray-100 text-gray-400'; // Falta (gris)
            if (diasAsistidos.includes(day)) {
                claseFondo = 'bg-green-100 text-green-800'; // Asistencia (verde)
            }
            
            let claseTexto = '';
            if (esHoy) {
                claseTexto = 'font-bold ring-2 ring-blue-500'; // Día actual
            }
            
            calendarGrid.innerHTML += `<div class='w-10 h-10 flex items-center justify-center rounded-full ${claseFondo} ${claseTexto}'>${day}</div>`;
        }
    }

    // Event Listeners para la navegación
    prevMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    // Renderizar el calendario inicial
    renderCalendar();
};
