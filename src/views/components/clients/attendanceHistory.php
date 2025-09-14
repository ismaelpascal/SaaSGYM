<div class="bg-white p-6 rounded-lg border border-gray-200">

    <div class="flex justify-between items-center border-b pb-2 mb-4">
        <h3 class="text-xl font-bold text-gray-800">Historial de Asistencias</h3>
        <button id="prevMonthBtn" class="p-2 rounded-full hover:bg-gray-100"><</button>
        <h3 id="calendarMonthYear" class="text-xl font-bold text-gray-800"></h3>
        <button id="nextMonthBtn" class="p-2 rounded-full hover:bg-gray-100">></button>
    </div>
    
    <div class="grid grid-cols-7 gap-2 text-center">
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">L</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">M</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">M</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">J</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">V</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">S</div>
        <div class="font-bold text-gray-500 text-sm w-10 h-10 flex items-center justify-center">D</div>
    </div>
    <div id="calendarGrid" class="grid grid-cols-7 gap-2 text-center mt-2">
    </div>
</div>
