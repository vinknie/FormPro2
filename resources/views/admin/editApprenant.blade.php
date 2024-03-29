@extends('layout.master')

@section('content')

    @include('include.navadmin')
    <div class="row">

        <h1>Modifier l'Apprenant : {{ $getUser->nom }} {{ $getUser->prenom }}</h1>
        @if (session('error'))
            <p class="alert alert-warning">{{ session('error') }}</p>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif

        <form class="row" action="{{ route('admin.updateApprenant', $getUser->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 border-right">
                <div class="p-3 pb-5">
                    <h3>Informations</h3>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control"
                                value="{{ $getUser->nom }}" disabled="disabled"></div>
                        <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control"
                                value="{{ $getUser->prenom }}" disabled="disabled"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Numéro de Téléphone</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $getUser->telephone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">E-mail</label>
                            <input type="text" class="form-control" name="email" value="{{ $getUser->email }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="{{ $getUser->adresse }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Complement d'adresse</label>
                            <input type="text" class="form-control" name="complementAdresse"
                                value="{{ $getUser->complementAdresse }}">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Ville</label>
                                <input type="text" class="form-control" name="ville" value="{{ $getUser->ville }}">
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Code Postal</label>
                                <input type="text" class="form-control" name="codePostal"
                                    value="{{ $getUser->codePostal }}">
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Pays</label>
                                <input type="text" name="pays" class="form-control" value="{{ $getUser->pays }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Date de Naissance</label>
                                <input type="text" class="form-control" value="{{ $getUser->date_naissance }}"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Sexe</label>
                                <input type="text" class="form-control" value="{{ $getUser->sexe }}"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Niveau</label>
                                <input type="text" class="form-control" name="niveau" value="{{ $getUser->niveau }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Status</label>
                                <input type="text" class="form-control" name="status" value="{{ $getUser->status }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="row mt-3">
                    <h3>Formations</h3>
                    @foreach ($userFormation as $userformation1)
                        <div class="col-md-4"><label class="labels">Formation</label><input type="text"
                                class="form-control" value="{{ $userformation1->FormNom }}" disabled="disabled"></div>
                        <div class="col-md-3"><label class="labels">Date de Début</label><input type="text"
                                class="form-control" value="{{ $userformation1->date_debut }}" disabled="disabled">
                        </div>
                        <div class="col-md-3"><label class="labels">Date de Fin</label><input type="text"
                                class="form-control" value="{{ $userformation1->date_fin }}" disabled="disabled"></div>

                        <div class="col-md-2">
                            <label class="labels">Supprimer</label>
                            <a href="{{ URL::to('backoffice/userApprenant/edit/delete/' . $userformation1->id_formation . '/' . $userformation1->id_utilisateur) }}"
                                class="btn btn-danger" onclick="return confirm('Etes vous sur de vouloir Supprimé!?')" data-method="delete"><i class="fa fa-times"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-3">
                    <h3>Ajouter une Formation</h3>
                    <div class="mb-3">
                        <label>Formation Choisi<span class="text-danger">*</span></label>
                        <select class="form-select" name="id_formation" id="id_formation">
                            <option value="">--Choisi une formation--</option>
                            @foreach ($formations as $formation)
                                <option value="{{ $formation->id_formation }}">{{ $formation->nom }} -
                                    {{ $formation->date_debut }} / {{ $formation->date_fin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="">
                    <h3>Papier Nécessaire Formation</h3>
                        @foreach($userFormation as $userformation)
                        
                           <h5>{{ $userformation->FormNom }} {{ $userformation->date_debut }}/{{ $userformation->date_fin }}</h5> 
                           <div>
                                <span>Attestation d'entrée : </span><a href="{{ URL::to('/backoffice/userApprenant/pdf/entree/' . $userformation->id . '/' .$userformation->id_formation ) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Télécharger <b>Attestation d'entrée</b></a>
                            </div><br>
                            <div>
                                <span>Attestation de Fin : </span><a href="{{ URL::to('/backoffice/userApprenant/pdf/fin/' . $userformation->id . '/' .$userformation->id_formation ) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Télécharger <b>Attestation de fin</b></a>
                            </div><br>
                            <div>
                                <span>Contrat de Formation : </span><a href="{{ URL::to('/backoffice/userApprenant/pdf/contrat/' . $userformation->id . '/' .$userformation->id_formation ) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Télécharger <b>Contrat de formation</b></a>
                            </div><br>
                            <div>
                                <span>Convention de Formation : </span><a href="{{ URL::to('/backoffice/userApprenant/pdf/convention/' . $userformation->id . '/' .$userformation->id_formation ) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Télécharger <b>Convention de formation</b></a>
                            </div><br>
                        @endforeach
                </div>
            </div>
    </div>
    </div>
    <div class="row">
        <button type="submit" value="submit" name="test" class="btn btn-primary">Modifier</button>
    </div>
    </form>
    </div>

@endsection
