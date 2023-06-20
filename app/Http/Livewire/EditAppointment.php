<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;


class EditAppointment extends Component
{
    public $open = false;

    Protected $listeners = ['modal','delete'];
    public $title;
    public $Nom;
    public $Prenom;
    public $horain;
    public $horaFn;
    public $date;
    Public $user_id;
    Public $app_id;

    public function render()
    {
        return view('livewire.edit-appointment');
    }

    Public function modal($info)
    {
        $this->open = true;
        $app= Appointment::join('userbs','userbs.id','=','appointments.user_id')
                        ->select('userbs.id AS id_user','Nom','Prenom','date','horeIn','horeFn','appointments.id AS appoint_id')
                        ->where('appointments.id',$info['id'])->first();

        $this->title= $info['title'];
        $this->Nom= $app->Nom;
        $this->Prenom= $app->Prenom;
        $this->horain= Carbon::parse($app->horeIn)->format('H:i:s');
        $this->horaFn= Carbon::parse($app->horeFn)->format('H:i:s');
        $this->date= Carbon::parse($app->date)->format('Y-m-d');;
        $this->user_id= $app->id_user;
        $this->app_id = $info['id'];
        
    }

    public function save(){
        Appointment::where('id', $this->app_id)->update([
            'horeIn'=> $this->horain,
            'horeFn'=> $this->horaFn,
            'date'=> $this->date,
            'user_id' => $this->user_id
        ]);

        $this->emit('CreationAPP');
        $this->emit('alert','le rendez-vous a été modifiécréés avec succès');
        $this->reset('open','horain','horaFn','date');
    }

    public function delete($id)
    {
        Appointment::where('id',$id)->delete();
        $this->emit('CreationAPP');
        $this->reset('open','horain','horaFn','date');
    }

    
}
