<?php

namespace App\Http\Livewire;

use App\Models\Userb;
use Livewire\Component;

class EditUserb extends Component
{
    public $open = false;

    public $tab = 'tab1';

    public $user;

    protected $rules = [
        'user.Nom' => 'required|string',
        'user.Prenom' => 'required|string',
        'user.Ville' => 'required|string',
        'user.Province' => 'required|string',
        'user.CodePostal' =>'required|string',
        'user.Adresse' => 'required',
        'user.Telephone' => 'required',
        'user.Courriel' => 'required|email',
        'user.Langue' => 'required|string',
        'user.EtatMatrimonial' => 'required',
        'user.StatutCanada' => 'required',
        'user.DateNaiss' => 'required',
        'user.Pays' => 'required|string',
        'user.Genre' => 'required|string',
        'user.Menage' => 'required|string',
        'user.Revenu' => 'required|numeric',
        'user.Type_logement' => 'required|string',
        'user.status'=> 'required',
        'user.Q1' => 'required',
        'user.Q2' => 'required',
        'user.Q3' => 'required',
        'user.Q4' => 'required',
        'user.Q5' => 'required',
    ];

    public function mount(Userb $user){
        $this->user = $user;
    }

    public function save(){
        $this->validate();

        $this->user->save();

        $this->emitTo('show-userbs','render');
        $this->emit('alert','les utilisateurs ont été mis à jour avec succès');
        $this->reset('open','tab');
    }
    public function render()
    {
        return view('livewire.edit-userb');
    }
}
