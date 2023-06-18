<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Userb;
use Livewire\Component;
use Carbon\Carbon;
use DragonCode\Support\Facades\Helpers\Arr;

class CreateAppointment extends Component
{
    public $open = false;
    public $users;
    public $horeIn;
    public $horeFn;
    public $dateApp;
    public $user_id;

    protected $listeners = 'modal';

    public function mount()
    {
        $this->users= Userb::select('id','Nom','Prenom','status')
        ->where('status',1)
        ->get();
    }

    public function render()
    {
        return view('livewire.create-appointment');
    }

    public function modal($info)
    {   
        $this->open = true;
        $this->reset('horeIn','horeFn','dateApp');

        $this->dateApp = Carbon::parse(Arr::get($info,'start'))->format('Y-m-d');
        
        if($info['allDay']){
            $this->horeIn = '00:00';
            $this->horeFn = '23:59';
        }
        else
        {
            $this->horeIn = Carbon::parse(Arr::get($info,'startStr'))->format('H:i:s');
            $this->horeFn = Carbon::parse(Arr::get($info,'endStr'))->format('H:i:s');
        }

    }

    public function save()
    {
         Appointment::create([
            'horeIn'=>$this->horeIn,
            'horeFn'=>$this->horeFn,
            'date'=>$this->dateApp,
            'user_id'=>$this->user_id
        ]);

        $this->emitTo('show-appointment','render');
        $this->emit('alert','le payment ont été créés avec succès');

        $this->reset('open','horeIn','horeFn','dateApp');
    }
}
