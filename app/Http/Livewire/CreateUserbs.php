<?php

namespace App\Http\Livewire;

use App\Models\Fam;
use App\Models\Userb;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateUserbs extends Component
{
    public $open = false;

    public $tab = 'tab1';

    public $Nom, $Prenom, $Ville, $Province, $CodePostal, $Adresse, $Telephone, $Courriel, $Langue, $EtatMatrimonial, $StatutCanada, $DateNaiss, $Pays, $Genre, $Menage;

    public $Revenu, $Type_logement, $Q1, $Q2, $Q3, $Q4, $Q5, $userId;

    public $numFamilyMembers = 0;

    public $familyMembers = [];

    protected $rules = [
        'Nom' => 'required|string',
        'Prenom' => 'required|string',
        'Ville' => 'required|string',
        'Province' => 'required|string',
        'CodePostal' =>'required',
        'Adresse' => 'required',
        'Telephone' => 'required',
        'Courriel' => 'required|email|unique:userbs',
        'Langue' => 'required',
        'EtatMatrimonial' => 'required',
        'StatutCanada' => 'required',
        'DateNaiss' => 'required',
        'Pays' => 'required|string',
        'Genre' => 'required',
        'Menage' => 'required',
        'Revenu' => 'required|numeric',
        'Type_logement' => 'required',
        'Q1' => 'required',
        'Q2' => 'required',
        'Q3' => 'required',
        'Q4' => 'required',
        'Q5' => 'required',
        'numFamilyMembers' => 'required|integer|min:0',
        'familyMembers' =>'array',
        'familyMembers.*.NomCom' => 'required|string',
        'familyMembers.*.LienP' => 'required|string',
        'familyMembers.*.Sex' => 'required|string',
        'familyMembers.*.Age' => 'required|numeric',
    ];

    public function mount(){
        $this->userId = Auth::id();
    }

    public function save()
    {
        $this->validate();
        

        $user =  Userb::create([
            'Nom' => $this->Nom,
            'Prenom' => $this->Prenom,
            'Ville' => $this->Ville,
            'Province' => $this->Province,
            'CodePostal' => $this->CodePostal,
            'Adresse' => $this->Adresse,
            'Telephone' => $this->Telephone,
            'Courriel' => $this->Courriel,
            'Langue' => $this->Langue,
            'EtatMatrimonial' => $this->EtatMatrimonial,
            'StatutCanada' => $this->StatutCanada,
            'DateNaiss' => $this->DateNaiss,
            'Pays' => $this->Pays,
            'Genre' => $this->Genre,
            'Menage' => $this->Menage,
            'Revenu' => $this->Revenu,
            'Type_logement' => $this->Type_logement,
            'Q1' => $this->Q1,
            'Q2' => $this->Q2,
            'Q3' => $this->Q3,
            'Q4' => $this->Q4,
            'Q5' => $this->Q5,
            'userl_id' => $this->userId
        ]);

        foreach ($this->familyMembers as $familyMemberData) {

            $familyMember = new Fam([
                'NomCom' => $familyMemberData['NomCom'],
                'LienP' => $familyMemberData['LienP'],
                'Sex' => $familyMemberData['Sex'],
                'Age' => $familyMemberData['Age']
            ]);

            $user->fam()->save($familyMember);
        }


        $this->emitTo('show-userbs','render');
        $this->emit('alert','les utilisateurs ont été créés avec succès');
        $this->reset();
    }


    public function addFamilyMember()
    {
        $this->numFamilyMembers++;
        
        $this->familyMembers[$this->numFamilyMembers] = [
            'NomCom' => '',
            'LienP' => '',
            'Sex' => '',
            'Age' => '',
        ];
    }

    public function removeFamilyMember($index)
    {
        unset($this->familyMembers[$index]);
        $this->numFamilyMembers--;
    }

    public function render()
    {
        return view('livewire.create-userbs');
    }
}
