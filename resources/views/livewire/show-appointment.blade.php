<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        @livewire('create-appointment')
        @livewire('edit-appointment')
    </div>

    <div id="calendar"></div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script>
            document.addEventListener('livewire:load', function() {
                // Obtén los eventos de las citas desde tu base de datos
                // y conviértelos en un formato adecuado para FullCalendar

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },

                    selectable: true,
                    selectMirror: true,
                    eventDisplay:'block',

                    select: function(info) {
                        livewire.emitTo('create-appointment', 'modal', info);
                        //alert('selected ' + info.startStr + ' to ' + info.endStr);
                    },
                    eventClick: function(info) {
                        livewire.emitTo('edit-appointment','modal', info.event);
                    },
                    events: "{{url('appointment/show')}}",
                });

                calendar.render();

                Livewire.on('CreationAPP', function() {
                    calendar.refetchEvents();
                });

            });
        </script>
    @endpush
</div>
