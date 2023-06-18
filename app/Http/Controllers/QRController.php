<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function generateQRAndPDF($id)
    {
        $qrCode = QrCode::format('png')->size(150)->generate($id);

        $user=payment::join('userbs','userbs.id','=','payments.userb_id')
        ->select('userbs.id','userbs.Nom','userbs.Prenom','amount','date')
        ->where('payments.payment_id', $id)
        ->first();

        $pdf = Pdf::loadView('report/pdf', compact('qrCode','user'))->setPaper(array(0, 0,219.21, 560),'portrait');

        
        return $pdf->stream('qr.pdf');
    }
}
