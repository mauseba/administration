<?php

namespace App\Http\Livewire;

use App\Models\payment;
use App\Models\Userb;
use Livewire\Component;
use Illuminate\Support\Str;


class CreatePayment extends Component
{
    public $open = false;

    public $options;
    public $selectedOption;
    public $search;

    public $id_user;
    public $amount = 3.00;
    Public $statup = 2;
    public $q_url = 'url';

    public function mount()
    {
        $this->options = Userb::select('id','Nom','Prenom')
                        ->where('status', 1)->get();
    }

    public function render()
    {
        $info= Userb::select('id','Nom','Prenom')
                        ->where('id',$this->selectedOption)
                        ->first();

        if(!empty($info)){
            $this->id_user = $info->id;
        }

        return view('livewire.create-payment',compact('info'));
    }

    public function save()
    {
        $payment= payment::create([
            'payment_id'=> Str::random(10),
            'amount'=> $this->amount,
            'statup'=> $this->statup,
            'qr_url'=> $this->q_url
        ]);

        $payment->userb()->attach($this->id_user,['payment_id'=>$payment->payment_id]);

        

        $this->emitTo('show-payment','render');
        $this->emit('alert','le payment ont été créés avec succès');

        $this->reset('open');

        $this->generateQRAndPDF($payment->payment_id);

        
    }

    public function generateQRAndPDF($id)
    {
        redirect()->route('payment.pdf', ['id' => $id]);
    }
}
