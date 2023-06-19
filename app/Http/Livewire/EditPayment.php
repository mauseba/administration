<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;


class EditPayment extends Component
{
    public $open = false;

    public $id_user;
    public $amount = 3.00;
    Public $statup = 2;
    public $date;
    public $group = 1;
    public $hourap;
    public $interval = 7;
    public $Nom;
    public $Prenom;
    public $payment_id;

    public function mount(payment $pay)
    {
        $this->id_user = $pay->id;
        $this->date = $pay->date;
        $this->payment_id = $pay->payment_id;
        $this->group = $pay->groupe;
        $this->hourap = $pay->hourap;
        $this->Nom= $pay->Nom;
        $this->Prenom= $pay->Prenom;
    }
    
    public function render()
    {
        return view('livewire.edit-payment');
    }

    public function save()
    {
        payment::where('payment_id', $this->payment_id)->update(['statup'=> 1,'amount'=> $this->amount]);

        if($this->amount < 3.00){
            $this->amount = (3.00 - $this->amount) + 3.00;
        }

        if($this->interval > 7){
            $this->date = Carbon::createFromFormat('Y-m-d', $this->date)->addDays($this->interval);
        }else{
            $this->date= Carbon::createFromFormat('Y-m-d', $this->date)->next(Carbon::FRIDAY);
        }

        $payment= payment::create([
            'payment_id'=> Str::random(10),
            'amount'=> $this->amount,
            'statup'=> $this->statup,
            'date'=>  $this->date,
            'groupe'=>$this->group,
            'hourap'=>$this->hourap,
            'userb_id'=> $this->id_user
        ]);

        $this->emitTo('show-payment','render');
        $this->emit('alert','le payment ont été créés avec succès');

        $this->generateQRAndPDF($payment->payment_id);
    }

    public function generateQRAndPDF($id)
    {
        redirect()->route('payment.pdf', ['id' => $id]);
    }

}
