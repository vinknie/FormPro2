@extends('layout.master')

@section('content')

@include('include.navadmin')

<form class="" action="{{ url('/backoffice/chapitre/createChapitre') }}" method="post">
    @csrf
    
    <h1 class="text-center">Ajouter un Chapitre</h1>
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
    
    
    <div class="input-field">
        <table class="table table-bordered" id="table_field2">
            <tr>
                <th>Nom du chapitre</th>
                <th>Ajouter ou supprimer</th>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="nomchapitre[]" required=""></td>
                <td><input class="btn btn-warning" type="button" name="adddd" id="adddd" value="Ajouter"></td>
            </tr>
        </table>
        {{-- <center> --}}
            <div class="row">
                <div class="col-12 ps-0">
                    <button id="btncreate" type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
        {{-- </center> --}}
    </div>
</form>

<hr>
<h1 class="text-center">Modifier les Chapitres Via les Matieres</h1>
<select name="id_formation2" id="id_formation2">
    <option value="">Select Formation</option>
    @if(count($formations) > 0)
        @foreach ($formations as $formation )
            <option value="{{ $formation['id_formation'] }}">{{ $formation->nom }}</option>
        @endforeach
    @endif
</select>

<table class="table table-bordered">
    <tr>
        <td>ID Matiere</td>
        <th>Nom de la matiere</th>     
        <td colspan = 2>Action</td>
    </tr>
    <tbody id="tbody">
    {{-- @if (count($matieres) > 0 )
        @foreach ($matieres as $matiere)
            <tr>
                <td>{{ $matiere['id_matiere']}}</td>
                <td>{{ $matiere['nom']}}</td>
                <td><a href="{{ route('admin.editchapitre', $matiere->id_matiere) }}" class="btn btn-primary">Edit</a></td>
            </tr>
        @endforeach        
    @endif --}}
    </tbody>
</table>






<script>
    jQuery(document).ready(function()
    {
        jQuery('select[name="id_formation"]').on('change',function(){
            var formationID = jQuery(this).val();
            console.log(formationID);
            if(formationID)
            {
                jQuery.ajax({
                    url : '/backoffice/chapitre/getMatieres/' +formationID,
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


        let html = '<tr><td><input class="form-control" type="text" name="nomchapitre[]" required=""></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';

$("#adddd").click(function(){
            // if(x <= max){
            $("#table_field2").append(html);
            // x++;
        //}
        });
        
        $("#table_field2").on('click','#remove',function(){
            $(this).closest('tr').remove();
            // x--;
        })


        $("#id_formation2").on('change',function(){
            var formation = $(this).val();
            $.ajax({
                url : '/backoffice/chapitre/filterMatiere',
                type:"GET",
                data:{'formation':formation},
                success:function(data){
                    var matieres = data.matieres;
                    var html = '';
                    if(matieres.length > 0){
                        for(let i = 0; i<matieres.length; i++){
                            html += '<tr>\
                                <td>'+matieres[i]['id_matiere']+'</td>\
                                <td>'+matieres[i]['nom']+'</td>\
                                <td><a href="/backoffice/chapitre/editchapitre/'+matieres[i]["id_matiere"]+'" class="btn btn-primary">Edit</a></td>\
                                </tr>';
                            console.log(matieres[i]['id_matiere']);
                        }

                    

                    }
                    else{
                        html += '<tr>\
                            <td>Pas de Matiere Trouvé</td>\
                            </tr>';
                    }
                    $("#tbody").html(html);
                    console.log(data);
                }
            })
        })


    });

    

</script>


@endsection