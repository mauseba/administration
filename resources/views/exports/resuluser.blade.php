<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Utiliseteur</h1> <br>
    <h3><strong>Total de clients servis: </strong> {{$results->count()}}</h3> <br>

    <table>
        <thead>
        <tr>
            <th><strong>Id</strong></th>
            <th><strong>Nom</strong></th>
            <th><strong>Prenom</strong></th>
            <th><strong>Ville</strong></th>
            <th><strong>Province</strong></th>
            <th><strong>CodePostal</strong></th>
            <th><strong>Telephone</strong></th>
            <th><strong>Courriel</strong></th>
            <th><strong>Adresse</strong></th>
            <th><strong>Langue</strong></th>
            <th><strong>EtatMatrimonial</strong></th>
            <th><strong>StatutCanada</strong></th>
            <th><strong>DateNaiss</strong></th>
            <th><strong>Pays</strong></th>
            <th><strong>Genre</strong></th>
            <th><strong>Menage</strong></th>
            <th><strong>status</strong></th>
            <th><strong>Revenu</strong></th>
            <th><strong>Type_logement</strong></th>
            <th><strong>Etes-vous déjà inscrit(e) dans une banque alimentaire?:</strong></th>
            <th><strong>Études postsecondaire - Cegep + Universite(+18)?</strong></th>
            <th><strong>Nouv. inmigrant/refugie depuis moins de 10 ans?</strong></th>
            <th><strong>Diète particuliere?</strong></th>
            <th><strong>Première Nation, Metis, Inuits(+18)?</strong></th>
            <th><strong>DATE DE CRÉATION</strong></th>

        </tr>
        </thead>
        <tbody>
        @foreach($results as $resul)
            <tr>
                <td>{{ $resul->id }}</td>
                <td>{{ $resul->Nom }}</td>
                <td>{{ $resul->Prenom }}</td>
                <td>{{ $resul->Ville }}</td>
                <td>{{ $resul->Province }}</td>
                <td>{{ $resul->CodePostal }}</td>
                <td>{{ $resul->Telephone }}</td>
                <td>{{ $resul->Courriel }}</td>
                <td>{{ $resul->Adresse }}</td>
                <td>{{ $resul->Langue }}</td>
                <td>{{ $resul->EtatMatrimonial }}</td>
                <td>{{ $resul->StatutCanada }}</td>
                <td>{{ $resul->DateNaiss }}</td>
                <td>{{ $resul->Pays }}</td>
                <td>{{ $resul->Genre }}</td>
                <td>{{ $resul->Menage }}</td>
                <td>@if ($resul->status==1)
                    Active
                @else
                    Inactive
                @endif</td>
                <td>{{ $resul->Revenu }}</td>
                <td>{{ $resul->Type_logement }}</td>
                <td>{{ $resul->Q1 }}</td>
                <td>{{ $resul->Q2 }}</td>
                <td>{{ $resul->Q3 }}</td>
                <td>{{ $resul->Q4 }}</td>
                <td>{{ $resul->Q5 }}</td>
                <td>{{ $resul->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>