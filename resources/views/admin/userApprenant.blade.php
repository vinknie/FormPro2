@extends('layout.master')

@section('content')

@include('include.navadmin')
<div class="col-md-12">
<form action="{{ route('advance_search') }}" method="GET" class="d-flex">
    <input type="text" name="nom" class="form-control me-1" placeholder="Nom"><br>
    <input type="text" name="prenom" class="form-control me-1" placeholder="Prénom"><br>
    <input type="text" name="email" class="form-control me-1" placeholder="E-mail"><br>
    <select name="sexe" class="form-select">
        <option value="">--Choisi un sexe--</option>
        <option value="homme">homme</option>
        <option value="femme">femme</option>
        <option value="non-binaire">non-binaire</option>
    </select>
    <input type="text" name="nomForm" class="form-control me-1" placeholder="Nom Formation"><br>
    <input type="text" name="dateForm" class="form-control me-1" placeholder="Date de Début Formation" value="{{ old('dateForm') }}"><br>
    <input type="submit" value="Search" class="btn btn-success">
    </form>
</div>
{{-- @php
    dd($data);
@endphp --}}
<div class="col-md-12">
    <h1>Liste des Apprenants</h1>
    <table class="table table-striped">
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Téléphone</th>
    <th>Sexe</th>
    <th>Nom Formation</th>  
    <th>Date Formation</th>
    </tr>
    @foreach($data as $pep)
    <tr>
    <td>{{ $pep->nom }}</td>
    <td>{{ $pep->prenom }}</td>
    <td>{{ $pep->email }}</td>
    <td>{{ $pep->role }}</td>
    <td>{{ $pep->telephone }}</td>
    <td>{{ $pep->sexe }}</td>
    
    <td>{!! test($pep->nomForm) !!}</td>
    <td>{!! test($pep->dateForm) !!}</td>
    </tr>
    @endforeach
    </table>
    </div>

@php
    function test($string)
    {
        if (str_contains($string, ',')) {
            $string = explode(',', $string);
            $string = implode(' <hr>', $string);
        }
        return $string;
    }
@endphp



@endsection

