<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Livewire\Component;
use Livewire\WithPagination;


class ShowPayment extends Component
{
    use WithPagination;

    public $search;

    public $option;

    public function render()
    {
        $query= payment::query();

        switch ($this->option) {
            case 'Name':
                $query->join('payment_userb','payments.payment_id','=','payment_userb.payment_id')
                    ->join('userbs','userbs.id','=','payment_userb.userb_id')
                    ->where('userbs.status', 1)
                    ->where(
                        function($q) {
                          return $q
                                 ->where('Prenom', 'LIKE', '%' . $this->search . '%')
                                 ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
                         });
                break;
            case 'id':
                $query->join('payment_userb','payments.payment_id','=','payment_userb.payment_id')
                ->join('userbs','userbs.id','=','payment_userb.userb_id')
                ->where('userbs.status', 1)
                ->where('payments.payment_id', 'LIKE', '%' . $this->search . '%');
                break;      
            default:
                $query->join('payment_userb','payments.payment_id','=','payment_userb.payment_id')
                ->join('userbs','userbs.id','=','payment_userb.userb_id')
                ->where('userbs.status', 1);
                break;
        }
        
        $pay = $query->get();
        
        return view('livewire.show-payment',compact('pay'));
    }
}
