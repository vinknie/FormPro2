@extends('layout.master')

@section('content')
@auth

<div class="row">
    <h1>Bienvenue sur votre Page Personnelle : {{ $userFormation[0]->nom }} {{ $userFormation[0]->prenom }}</h1>
    <div class="col-md-3 border-right">
        <div class="d-flex flex-columnp-3 py-5"></div>
    </div>
    <div class="col-md-6 border-right">
        <div class="p-3 py-5"> 
            <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" value="{{ $userFormation[0]->nom }}" disabled="disabled"></div>
                <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control" value="{{ $userFormation[0]->prenom }}" disabled="disabled"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Numéro de Téléphone</label><input type="text" class="form-control"value="{{ $userFormation[0]->telephone }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">E-mail</label><input type="text" class="form-control" value="{{ $userFormation[0]->email }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control" value="{{ $userFormation[0]->adresse }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">Complement d'adresse</label><input type="text" class="form-control" value="{{ $userFormation[0]->complementAdresse }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">Ville</label><input type="text" class="form-control" value="{{ $userFormation[0]->ville }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">Code Postal</label><input type="text" class="form-control" value="{{ $userFormation[0]->codePostal }}" disabled="disabled"></div>
                <div class="col-md-12"><label class="labels">Pays</label><input type="text" class="form-control" value="{{ $userFormation[0]->pays }}" disabled="disabled"></div>
            </div>
            <div class="row mt-3">
                <h3>Mes Formations</h3>
                @foreach ($userFormation as $userformation1)
                    <div class="col-md-4"><label class="labels">Formation</label><input type="text" class="form-control" value="{{ $userformation1->FormNom }}" disabled="disabled"></div>
                    <div class="col-md-4"><label class="labels">Date de Début</label><input type="text" class="form-control" value="{{ $userformation1->date_debut }}" disabled="disabled"></div>
                    <div class="col-md-4"><label class="labels">Date de Fin</label><input type="text" class="form-control" value="{{ $userformation1->date_fin }}" disabled="disabled"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3">
       
    </div>
</div>
</div>
</div>
{{-- @php
    dd($userFormation);
@endphp --}}
@endauth


@endsection