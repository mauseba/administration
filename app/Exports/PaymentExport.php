<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class PaymentExport implements FromView
{

    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }
    
    public function view(): View
    {
        return view('exports.results', [
            'results' => $this->result
        ]);
    }

/*
    public function headings(): array
    {
        return [
            'payment_id',
            'Prenom',
            'Nom',
            'status_user',
            'montant',
            'status_pay',
            'date_rendez-vous',
            'date_creation',
            'date_mise à jour'
        ];
    }*/
}
