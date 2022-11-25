@extends('layout.master')

@section('content')
@auth

<div class="row">
    <h1>Bienvenue sur votre Page PDF : {{ $userFormation1[0]->nom }} {{ $userFormation1[0]->prenom }}</h1>
    <div class="col-md-1 border-right">
        <div class="d-flex flex-columnp-3 py-5"></div>
    </div>
    <div class="col-md-8 border-right">
        <div class="p-3 py-5"> 
            <div class="row mt-2">
                <h5>Attestion de Formation</h5>
                @foreach ($userFormation1 as $userformation )
                    <div class="col-md-3"><input type="text" class="form-control" value="{{ $userformation->FormNom }}" disabled="disabled"></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="{{ $userformation->date_debut }}" disabled="disabled"></div>
                    <div class="col-md-3"><input type="text" class="form-control" value="{{ $userformation->date_fin }}" disabled="disabled"></div>
                    <div class="col-md-3"><a href="{{ route('profil.pdf',$userformation->id_formation) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Télécharger <b>PDF</b></a></div>
                @endforeach
         
            </div>
            <div class="row mt-3">
            </div>
            <div class="row mt-3">
            
            </div>
        </div>
    </div>
    <div class="col-md-3">
       
    </div>
</div>
</div>
</div>

@endauth


@endsection