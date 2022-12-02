@extends('layout.master')

@section('content')

    @include('include.navadmin')


    <h1>Modifier le Formateur : {{ $getUser->nom }} {{ $getUser->prenom }}</h1>
    @if (session('error'))
        <p class="alert alert-warning">{{ session('error') }}</p>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif

    <div class="row">
        <form class="col-md-6" action="{{ route('admin.updateFormateur', $getUser->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class=" border-right">
                <div class="p-3 py-5">
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
            <div class="row">
                <button type="submit" value="submit" name="test" class="btn btn-primary">Modifier</button>
            </div>
        </form>

        <div class="col-md-6 border-right">
            <h3>Formation et Matiere</h3>
            <table class="table table-striped">
                <tr>
                    <th>Nom Formation</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Nom Matiere</th>
                    <th style="display:none">idusers</th>
                    <th>Supprimer la Matiere</th>

                </tr>
                @foreach ($FormationMatiere as $pep)
                    <tr>

                        <td>{{ $pep->nomForm }}</td>
                        <td>{{ $pep->date_debut }}</td>
                        <td>{{ $pep->date_fin }}</td>
                        <td>{{ $pep->nomMat }}</td>
                        <td style="display:none">{{ $pep->idUserMat }}</td>
                        <td>
                            <div class="col-md-2">
                                <a href="{{ URL::to('backoffice/userFormateur/edit/deleteMat/' . $pep->idUserMat . '/' . $pep->id_matiere) }}"
                                    class="btn btn-danger" onclick="return confirm('Etes vous sur de vouloir Supprimé!?')"
                                    data-method="delete"><i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
                <form class="" action="{{ url('backoffice/userFormateur/edit/addMat/' .$getUser->id) }}" method="post">
                    @csrf
                    @if(session('fail'))
                    <div class="alert alert-warning">
                        {{ session('fail') }}
                    </div>
                    @endif
                    <h3>Ajouter Matiere</h3>
                    <hr>
                    <select name="id_formation" >
                        <option value="">--Choisi une formation--</option>
                        @foreach ( $formations as $formation )
                            <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
                            
                        @endforeach
                    </select>
                    <select name="id_matiere" >
                        {{-- <option value="">--Choisi une Matiere--</option> --}}
                    </select>
                   
                     <div class="row">
                <div class="col-12 ps-0">
                    <button id="btncreate" type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>


    <script>
        jQuery(document).ready(function()
        {
            jQuery('select[name="id_formation"]').on('change',function(){
                var formationID = jQuery(this).val();
                console.log(formationID);
                if(formationID)
                {
                    jQuery.ajax({
                        url : '/backoffice/userFormateur/edit/getMatieres/' +formationID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            jQuery('select[name="id_matiere"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="id_matiere"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
    
                }
                else{
                    $('select[name="id_matiere"]').empty();
                }
            });

        });

    

</script>


@endsection
