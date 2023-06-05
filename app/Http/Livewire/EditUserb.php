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
        'user.Nom' => 'required',
        'user.Prenom' => 'required',
        'user.Ville' => 'required',
        'user.Province' => 'required',
        'user.CodePostal' =>'required',
        'user.Adresse' => 'required',
        'user.Telephone' => 'required',
        'user.Courriel' => 'required',
        'user.Langue' => 'required',
        'user.EtatMatrimonial' => 'required',
        'user.StatutCanada' => 'required',
        'user.DateNaiss' => 'required',
        'user.Pays' => 'required',
        'user.Genre' => 'required',
        'user.Menage' => 'required',
        'user.Revenu' => 'required',
        'user.Type_logement' => 'required',
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
