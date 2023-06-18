<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Livewire\Component;
use Livewire\WithPagination;
//use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentExport;



class ShowPayment extends Component
{
    use WithPagination;

    public $search;

    public $option='name';
    public $sort='payment_id';
    public $direction='desc';
    public $dateIn;
    public $dateFn;

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
            case 'reporte':
                $query->join('userbs','userbs.id','=','payments.userb_id')
                ->where(
                    function($q) {
                      return $q
                             ->where('Prenom', 'LIKE', '%' . $this->search . '%')
                             ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
                     })
                ->whereBetween('payments.updated_at', [$this->dateIn, $this->dateFn])
                ->where('userbs.status', 1);
                     
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

    public function createInform()
    {
        $query= payment::query();

        switch ($this->option) {
            case 'name':
                $query->join('userbs','userbs.id','=','payments.userb_id')
                    ->select('payment_id','Prenom','Nom','userbs.status','amount','statup','date','payments.created_at','payments.updated_at')
                    ->where('userbs.status', 1)
                    ->where(
                        function($q) {
                          return $q
                                 ->where('Prenom', 'LIKE', '%' . $this->search . '%')
                                 ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
                         });
                break;
            case 'reporte':
                $query->join('userbs','userbs.id','=','payments.userb_id')
                ->select('payment_id','Prenom','Nom','userbs.status','amount','statup','date','payments.created_at','payments.updated_at')
                ->where(
                    function($q) {
                      return $q
                             ->where('Prenom', 'LIKE', '%' . $this->search . '%')
                             ->orWhere('Nom', 'LIKE', '%' . $this->search . '%');
                     })
                ->whereBetween('payments.updated_at', [$this->dateIn, $this->dateFn])
                ->where('userbs.status', 1);

                break;
            default:
                $query->join('userbs','userbs.id','=','payments.userb_id')
                ->where('userbs.status', 1);
                break;
        }
        $result= $query->get();

       // return Redirect::route('payment.excel')->with('result',$result);

       return Excel::download(new PaymentExport($result), 'report.xlsx');
    }
    
}
