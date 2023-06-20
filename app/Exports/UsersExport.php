<?php

namespace App\Exports;

use App\Models\Userb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;



class UsersExport implements FromView
{
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }
    
    public function view(): View
    {
        return view('exports.resuluser', [
            'results' => $this->result
        ]);
    }

}
