<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Report</title>
    @php

        use Carbon\Carbon;
        $datef= Carbon::parse($user->date)->isoFormat('D MMMM YYYY', 'fr');

    @endphp

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style type="text/css"> 
        .transformacion2 { text-transform: uppercase;}     
    </style> 


</head>

<body>
    <div align="center"><img src="{{ asset('images/caciprint.png') }}" alt="" width="230"/></div>
    <H2 align="center">DÉPANNAGE ALIMENTAIRE</H2>
    <p align="center">6161 rue Périnault, Montreal</p>

    <h4 class="transformacion2" align="center"><strong>{{ $user->Nom }} <br>{{ $user->Prenom }}</strong></h4>

    <p>votre prochain rendez-vous</p>
    <h3 align="center">{{$datef}}</h3> 

    <p>Entre:<strong> 15h30 et 17h. </strong></p>

    <p>A payer:<strong> {{$user->amount}}$ </strong> </p> 

    <div align="center"><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code"></div>

    <p style="font-size: large" align="center">Pour toute information, <br> SVP appelez le <strong>CACI</strong> au <br> <strong>514-856-3511, post 290</strong></p>
</body>

</html>
