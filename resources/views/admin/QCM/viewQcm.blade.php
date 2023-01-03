@extends('layout.master')

@section('content')
    @include('include.navadmin')

    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>

        <div class="col-9">
    <h1 class="text-center">Voir les QCM</h1>
    <select name="id_formation2" id="id_formation2">
        <option value="">Select Formation</option>
        @if(count($formations) > 0)
            @foreach ($formations as $formation )
                <option value="{{ $formation['id_formation'] }}">{{ $formation->nom }}</option>
            @endforeach
        @endif
    </select>
        </div>
    </div>



















<script>
    jQuery(document).ready(function()
    {
    $("#id_formation2").on('change',function(){
            var formation = $(this).val();
            $.ajax({
                url : '/backoffice/chapitre/filterMatiere',
                type:"GET",
                data:{'formation':formation},
                success:function(data){
                    var matieres = data.matieres;
                    var html = '';
                    console.log(matieres);
                    if(matieres.length > 0){
                        for(let i = 0; i<matieres.length; i++){
                            html += '<tr>\
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