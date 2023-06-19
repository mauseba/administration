<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Paiements</h1> <br>
    <h3><strong>Total de clients servis: </strong> {{$results->count()}}</h3> <br>

    <table>
        <thead>
        <tr>
            <th><strong>payment_id</strong></th>
            <th><strong>Prenom</strong></th>
            <th><strong>Nom</strong></th>
            <th><strong>montant</strong></th>
            <th><strong>status_paiment</strong></th>
            <th><strong>date_rendez-vous</strong></th>
            <th><strong>groupe</strong></th>
            <th><strong>houre_rendez-vous</strong></th>
            <th><strong>date_creation</strong></th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $resul)
            <tr>
                <td>{{ $resul->payment_id }}</td>
                <td>{{ $resul->Prenom }}</td>
                <td>{{ $resul->Nom }}</td>
                <td>{{ $resul->amount }}</td>
                <td>@if ($resul->statup==1)
                    payé
                @else
                    pas payé
                @endif</td>
                <td>{{ $resul->date }}</td>
                <td>{{ $resul->groupe }}</td>
                <td>{{ $resul->hourap }}</td>
                <td>{{ $resul->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>