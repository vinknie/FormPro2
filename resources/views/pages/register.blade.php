@extends('layout.master')

@section('content')
    <h1>Register</h1>

    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="POST" action="{{ route('register.action') }}">
            @csrf
            <div class="mb-3">
                <label>Nom<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="nom" value="{{ old('nom') }}" />
            </div>
            <div class="mb-3">
                <label>Prénom<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="prenom" value="{{ old('prenom') }}" />
            </div>
            <div class="mb-3">
                <label>Téléphone<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="telephone" value="{{ old('telephone') }}" />
            </div>
            <div class="mb-3">
                <label>Date de naissance<span class="text-danger">*</span></label>
                <input class="form-control" type="date" id="end" name="date_naissance"
                value="2022-07-24" min="1950-01-01" max="2060-12-31" />
            </div>
            <div class="mb-3">
                <label>Adresse<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="adresse" value="{{ old('adresse') }}" />
            </div>
            <div class="mb-3">
                <label>Complement d'adresse</label>
                <input class="form-control" type="text"  name="complementAdresse" value="{{ old('complementAdresse') }}" />
            </div>
            <div class="mb-3">
                <label>Ville<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="ville" value="{{ old('ville') }}" />
            </div>
            <div class="mb-3">
                <label>Code Postal<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="codePostal" value="{{ old('codePostal') }}" />
            </div>
            <div class="mb-3">
                <label>Pays<span class="text-danger">*</span></label>
                <select  class="form-select" name="pays" id="pays">
                    <option value="france">France</option>
                    <option value="belgique">Belgique</option>
                    <option value="espagne">Espagne</option>
                    <option value="suisse">Suisse</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Sexe<span class="text-danger">*</span></label>
                <div>
                    <input type="radio" id="homme" name="sexe" value="homme">
                    <label for="homme">Homme</label>
                    <input type="radio" id="femme" name="sexe" value="femme">
                    <label for="femme">Femme</label>
                    <input type="radio" id="non-binaire" name="sexe" value="non-binaire">
                    <label for="non-binaire">Non-binaire</label>
                  </div>
            </div>
            <div class="mb-3">
                <label>E-Mail<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="email" value="{{ old('email') }}" />
            </div>
            
            <div class="mb-3">
                <label>Role<span class="text-danger">*</span></label>
                <select  class="form-select" name="role" id="role">
                    <option value="formateur">Formateur</option>
                    <option value="apprenant">Apprenant</option>
                </select>
            </div>
        <fieldset style="border:2px solid; padding: 10px;">
                <legend style="background-color: #000;color: #fff;padding: 3px 6px;">Si Apprenant , merci de remplir les informations suivante </legend>
            <div class="mb-3">
                <label>Status<span class="text-danger">*</span></label>
                <select  class="form-select" name="status" id="status">
                    <option value="">--Choisi un status--</option>
                    <option value="recherche">Recherche d'emploi</option>
                    <option value="etudiant">Etudiant</option>
                    <option value="employe">Employé</option>
                    <option value="entrepreneur">Auto Entrepreneur</option>
                    <option value="directeur">Directeur</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Niveau diplomant<span class="text-danger">*</span></label>
                <select  class="form-select" name="niveau" id="niveau">
                    <option value="">--Choisi un diplome--</option>
                    <option value="brevet">Brevet</option>
                    <option value="bac">Bac</option>
                    <option value="bac+2">Bac+2</option>
                    <option value="bac+5">Bac+5</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Formation Choisi<span class="text-danger">*</span></label>
                <select class="form-select" name="id_formation" id="id_formation" >
                    <option value="">--Choisi une formation--</option>
                    @foreach ( $formations as $formation )
                        <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
                        
                    @endforeach
                </select>
            </div>
        </fieldset>
            <div class="mb-3">
                <label>Nom d'utilisateur<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Mot de Passe<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label>Confirmer le Mot de Passe<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirmation" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                <a class="btn btn-danger" href="{{ route('pages.index') }}">Back</a>
            </div>
        </form>
    </div>


@endsection