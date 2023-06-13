<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Livewire\Component;

class ShowPayment extends Component
{
    public $search;

    public $option='name';

    protected $listeners = ['render'];

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
        
        $payes = $query->get();

        
        return view('livewire.show-payment',compact('payes'));
    }
    
}
