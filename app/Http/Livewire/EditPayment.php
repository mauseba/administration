<?php

namespace App\Http\Livewire;

use App\Models\payment;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;


class EditPayment extends Component
{
    public $id_user;
    public $amount = 3.00;
    Public $statup = 2;
    public $date;
    public $payment_id;

    public function mount(payment $pay)
    {
        $this->id_user = $pay->id;
        $this->date = $pay->date;
        $this->payment_id = $pay->payment_id;

    }
    
    public function render()
    {
        return view('livewire.edit-payment');
    }

    public function save()
    {
        payment::where('payment_id', $this->payment_id)->update(['statup'=> 1]);

        $dateg= Carbon::createFromFormat('Y-m-d', $this->date)->next(Carbon::FRIDAY);

        $payment= payment::create([
            'payment_id'=> Str::random(10),
            'amount'=> $this->amount,
            'statup'=> $this->statup,
            'date'=> $dateg,
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
