<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QR Code PDF</title>
    @php
        use Carbon\Carbon;
        $datef= Carbon::now()->startOfWeek()->next(Carbon::FRIDAY)->format('d/m/Y');
    @endphp

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body>
    <img src="{{ asset('images/caciprint.png') }}" alt="" width="150" /></td>

    <p>name:</p>
    {{ $user->Nom }}
    <p>Prenom:</p>
    {{ $user->Prenom }} <br>

    {{ $datef}}

    <p>entre: 15h30 et 17h</p>

   <p>A payer: {{$user->amount}}</p> 

    <h1>QR Code</h1>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
</body>

</html>
