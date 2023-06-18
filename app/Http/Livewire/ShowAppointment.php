<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Collection;

class ShowAppointment extends Component
{

    public function render()
    {
        $events = Appointment::join('userbs','userbs.id','=','appointments.user_id')->get();

        $formattedEvents = $this->formatEvents($events);

        return view('livewire.show-appointment',compact('formattedEvents'));
    }
    private function formatEvents(Collection $events)
    {
        return $events->map(function ($event) {
            return [
                'title' => 'apointment: ' .$event->Prenom ." ". $event->Nom,
                'start' => Carbon::parse($event->date)->format('Y-m-d') . 'T' . $event->horeIn,
                'end' => Carbon::parse($event->date)->format('Y-m-d') . 'T' . $event->horeFn
                //'url' => route('events.show', $event->id), // Si deseas agregar una URL para cada evento
            ];
        });
    }
}
