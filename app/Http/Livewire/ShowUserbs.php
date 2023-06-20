<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Userb;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\Fam;


class ShowUserbs extends Component
{
    use WithPagination;

    public $search;
    public $result;
    public $sort='id';
    public $direction='desc';
    public $status;
    
    protected $listeners = ['render','deletePer'];

    public function render()
    {
        $query= Userb::query();

        if(!empty($this->search)){
            $query->where(function ($q) {
                $q->where('Prenom', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
            });
        }

        if (!empty($this->status  && $this->status !== 'all')) {
            $query->where('status', $this->status);
        }
        $this->result = $query->orderBy($this->sort, $this->direction)->get();

        $users = $query->orderBy($this->sort, $this->direction)->paginate(10);

        
                    
        return view('livewire.show-userbs',compact('users'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function order($sort)
    {
        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        } else {
            
            $this->sort=$sort;
        }
        
    }
    public function deletePer(Fam $fam){

        $fam->delete();

        $this->emitTo('show-fam','render');
    }

    public function createInform()
    {
        return Excel::download(new UsersExport($this->result), 'reportutilisator.xlsx');
    }

}
