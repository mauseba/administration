<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Livewire\Component;
use Livewire\WithPagination;


class ShowPayment extends Component
{
    use WithPagination;

    public $search;

    public $option='name';
    public $sort='payment_id';
    public $direction='desc';

    protected $listeners = ['render','deletePay'];

    public function render()
    {
        $query= payment::query();

        switch ($this->option) {
            case 'name':
                $query->join('userbs','userbs.id','=','payments.userb_id')
                    ->where('userbs.status', 1)
                    ->where(
                        function($q) {
                          return $q
                                 ->where('Prenom', 'LIKE', '%' . $this->search . '%')
                                 ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
                         });
                break;
            case 'id':
                $query->join('userbs','userbs.id','=','payments.userb_id')
                ->where('userbs.status', 1)
                ->where('payments.payment_id', $this->search);

                break;      
            default:
                $query->join('userbs','userbs.id','=','payments.userb_id')
                ->where('userbs.status', 1);
                break;
        }
        
        $payes = $query->orderBy($this->sort, $this->direction)->paginate(10);


        return view('livewire.show-payment',compact('payes'));
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
    public function deletePay($pay){

        payment::where('payment_id',$pay)->delete();

        $this->emitTo('show-payment','render');
    }
    
}
