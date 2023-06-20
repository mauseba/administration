<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Appointment::join('userbs','userbs.id','=','appointments.user_id')
                            ->select('userbs.id AS id_user','Nom','Prenom','date','horeIn','horeFn','appointments.id AS appoint_id')
                            ->get();

        $formattedEvents = $this->formatEvents($events);
        
        return response()->json($formattedEvents);
    }

    private function formatEvents($events)
    {
        return $events->map(function ($event) {
            return [
                'title' => 'devis pour l utilisateur: ' .$event->Prenom ." ". $event->Nom,
                'start' => Carbon::parse($event->date)->format('Y-m-d') . 'T' . $event->horeIn,
                'end' => Carbon::parse($event->date)->format('Y-m-d') . 'T' . $event->horeFn,
                'id' =>  $event->appoint_id 
            ];
        });
    }}
