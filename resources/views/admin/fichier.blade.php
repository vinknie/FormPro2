@extends('layout.master')

@section('content')

@include('include.navadmin')

<form class="" action="{{ url('/backoffice/fichier/createFichier') }}" method="post">
    @csrf
    
    <h1 class="text-center">Ajouter un Fichier</h1>
    <hr>
    {{-- <select name="id_formation" >
        <option value="">--Choisi une formation--</option>
        @foreach ( $formations as $formation )
            <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
            
        @endforeach
    </select>
    <select name="id_matiere" >
    </select> --}}
    
    
    
    <div class="input-field">
        <table class="table table-bordered" id="table_field2">
            <tr>
                <th>Choisi Formation</th>
                <th>Choisi matiere</th>
                <th>Chapitre des Fichiers</th>
                <th>Nom du Fichier</th>
                <th>Description du Fichier</th>
                <th>Uploader le Fichier</th>
                <th>Ajouter ou supprimer</th>
            </tr>
            <tr>
                <td>
                    <select name="id_formation[]" >
                        <option value="">--Choisi une formation--</option>
                        @foreach ( $formations as $formation )
                            <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
                            
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="id_matiere" >
                        {{-- <option value="">--Choisi une Matiere--</option> --}}
                    </select>
                </td>
                <td>
                    <select name="id_chapitre[]" >
                    
                </select>
                </td>
                
                <td><input class="form-control" type="text" name="nomfichier[]" required=""></td>
                <td><input class="form-control" type="text" name="description[]" required=""></td>
                <td> <input type="file" name="file[]"></td>
                <td><input class="btn btn-warning" type="button" name="adddd" id="adddd" value="Ajouter"></td>
            </tr>
        </table>
       
            <div class="row">
                <div class="col-12 ps-0">
                    <button id="btncreate" type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
       
    </div>
</form>

<script>

    jQuery(document).ready(function()
    {
        jQuery('select[name="id_formation[]"]').on('change',function(){
            var formationID = jQuery(this).val();
            console.log(formationID);
            if(formationID)
            {
                jQuery.ajax({
                    url : '/cours/getMatieres/' +formationID,
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

        jQuery('select[name="id_matiere"]').on('change',function(){
            var matiereID = jQuery(this).val();
            console.log(matiereID);
            if(matiereID)
            {
                jQuery.ajax({
                    url : '/backoffice/fichier/getChapitre/' +matiereID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        jQuery('select[name="id_chapitre[]"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="id_chapitre[]"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });

            }
            else{
                $('select[name="id_chapitre[]"]').empty();
            }
        });

        let html = '<tr><td><select name="id_formation[]" ><option value="">--Choisi une formation--</option> @foreach ( $formations as $formation ) <option value="{{$formation->id_formation}}">{{$formation->nom}}</option> @endforeach </select> </td> <td> <select name="id_matiere" >{{-- <option value="">--Choisi une Matiere--</option> --}}</select> </td><td> <select name="id_chapitre[]" > </select> </td><td><input class="form-control" type="text" name="nomfichier[]" required=""></td><td><input class="form-control" type="text" name="description[]" required=""></td><td> <input type="file" name="file[]"></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';

        $("#adddd").click(function(){
                    // if(x <= max){
                    $("#table_field2").append(html);
                    // x++;
                //}
                });
                
                $("#table_field2").on('click','#remove',function(){
                    $(this).closest('tr').remove();
                    // x--;
                });


    });


</script>


@endsection