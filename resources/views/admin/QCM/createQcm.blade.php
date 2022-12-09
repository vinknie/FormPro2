@extends('layout.master')

@section('content')
    @include('include.navadmin')

    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>

        <div class="col-9">
            <form class="" action="{{ url('/backoffice/qcm/createQcm') }}" method="post" enctype="multipart/form-data">
            @csrf
    
            <h1 class="text-center">Créer un QCM</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
    
            <select name="id_formation[]">
                <option value="">--Choisi une formation--</option>
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
                @endforeach
            </select>
    
            <select name="id_matiere">
                {{-- <option value="">--Choisi une Matiere--</option> --}}
            </select>
    
            <select name="id_chapitre[]">
    
            </select>
            <hr>
            <div class="col-md-4">
                <label class="labels">Nom Du QCM</label>
                <input class="form-control" type="text" name="titre[]" required="">
            </div>
            <button id="btncreate" type="submit" class="btn btn-success">Créer</button>
        </div>
    </div>








    <script>
        jQuery(document).ready(function() {
            jQuery('select[name="id_formation[]"]').on('change', function() {
                var formationID = jQuery(this).val();
                console.log(formationID);
                if (formationID) {
                    jQuery.ajax({
                        url: '/backoffice/qcm/getMatieres/' + formationID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="id_matiere"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="id_matiere"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });

                } else {
                    $('select[name="id_matiere"]').empty();
                }
            });

            jQuery('select[name="id_matiere"]').on('change', function() {
                var matiereID = jQuery(this).val();
                console.log(matiereID);
                if (matiereID) {
                    jQuery.ajax({
                        url: '/backoffice/qcm/getChapitre/' + matiereID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="id_chapitre[]"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="id_chapitre[]"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });

                } else {
                    $('select[name="id_chapitre[]"]').empty();
                }
            });

        });





</script>

@endsection