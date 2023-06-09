<?php

namespace App\Http\Livewire;

use App\Models\payment;
use App\Models\Userb;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CreatePayment extends Component
{
    public $open = false;

    public $options;
    public $selectedOption;
    public $search;

    public $id_user;
    public $amount = 3.00;
    Public $statup = 2;
    public $group = 1;
    public $hourap;
    public $interval = 7;
    public $date;
    

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
        $this->date= Carbon::now()->next(Carbon::FRIDAY)->format('Y-m-d');

        if($this->interval > 7){
            $this->date = Carbon::createFromFormat('Y-m-d', $this->date)->addDays($this->interval);
        }

        $payment= payment::create([
            'payment_id'=> Str::random(10),
            'amount'=> $this->amount,
            'statup'=> $this->statup,
            'date'=> $this->date,
            'groupe'=>$this->group,
            'hourap'=>$this->hourap,
            'userb_id'=> $this->id_user
        ]);

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
