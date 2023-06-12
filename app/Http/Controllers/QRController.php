<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function generateQRAndPDF($id)
    {
        // Generar el código QR
        $qrCode = QrCode::format('png')->size(100)->generate($id);

        $user=payment::join('payment_userb','payments.payment_id','=','payment_userb.payment_id')
        ->join('userbs','userbs.id','=','payment_userb.userb_id')
        ->select('userbs.id','userbs.Nom','userbs.Prenom','amount')
        ->where('payments.payment_id', $id)
        ->first();

        // Pasar los datos a la vista PDF
        $pdf = Pdf::loadView('report/pdf', compact('qrCode','user'))->setPaper('letter');

        
        return $pdf->stream('qr.pdf');
    }
}
