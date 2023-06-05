<?php

namespace App\Http\Livewire;

use App\Models\Fam;
use Livewire\Component;
use Livewire\WithPagination;


class ShowFam extends Component
{
    use WithPagination;

    public $NomCom,$LienP,$Sex,$Age;

    protected $listeners = ['render'];

    protected $rules=[
        'NomCom'=>'required',
        'LienP'=>'required',
        'Sex'=>'required',
        'Age'=>'required'
    ];

    public $user;
   

    public function mount($user){
        $this->user = $user;
    }

    
    public function save(){

        $this->validate();

        Fam::create([
            'NomCom'=>$this->NomCom,
            'LienP'=>$this->LienP,
            'Sex'=>$this->Sex,
            'Age'=>$this->Age,
            'user_id'=>$this->user->id
        ]);

        $this->emit('alert','le fam ont été créés avec succès');
        $this->reset('NomCom','LienP','Sex','Age');

    }

    public function render()
    {

        $fams= Fam::where('user_id',$this->user->id)->paginate(10);

        return view('livewire.show-fam', compact('fams'));
    }

    
}
