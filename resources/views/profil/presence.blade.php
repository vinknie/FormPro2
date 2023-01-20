@extends('layout.master')

@section('content')
@auth

<h2>Liste des eleves</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eleves as $eleve)
        <tr>
            <th scope="row">1</th>
            <td>{{ $eleve->prenom}}</td>
            <td>{{ $eleve->nom}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endauth

@endsection