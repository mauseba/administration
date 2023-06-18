<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        @livewire('create-appointment')
        <div class="px-6 py-4" id="calendar"></div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script>
            document.addEventListener('livewire:load', function() {
            // Obtén los eventos de las citas desde tu base de datos
            // y conviértelos en un formato adecuado para FullCalendar

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'},
                    select: function(info) {
                        livewire.emitTo('create-appointment','modal',info);
                        //alert('selected ' + info.startStr + ' to ' + info.endStr);
                    },
                    events: @json($formattedEvents)
                    // Aquí puedes configurar más opciones de FullCalendar según tus necesidades
                });

                calendar.render();
            });
            
        </script>
    @endpush
</div>
