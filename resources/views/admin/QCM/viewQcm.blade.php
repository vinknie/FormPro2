@extends('layout.master')


@section('content')
    @include('include.navadmin')

    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>

        <div class="col-9">
        <h1 class="text-center">Voir les QCM</h1>
            <select name="id_formation" id="id_formation">
                <option value="">Select Formation</option>
                @if(isset($formations))
                    @foreach ($formations as $formation )
                        <option value="{{ $formation['id_formation'] }}">{{ $formation->nom }}</option>
                    @endforeach
                @elseif(isset($formationFormateur))
                    @foreach ($formationFormateur as $formation )
                        <option value="{{ $formation->id_formation }}">{{ $formation->nomForm }}</option>
                    @endforeach
                @endif
            </select>
            <select name="id_matiere" id="id_matiere" >
                {{-- <option value="">--Choisi une Matiere--</option> --}}
            </select>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Titre du QCM</th> 
                    <th>Chapitre</th>
                    <td colspan = 3>Action</td>
                </tr>
                </thead>
                <tbody id="tbody">
                
                </tbody>
            </table>
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
                    url : '/backoffice/qcm/viewQcm/getMatieresFormateur/' +formationID,
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

        $("#id_matiere").on('change',function(){
            var matiere = $(this).val();
            $.ajax({
                url : '/backofficeqcm/viewQcm/filterMatiere',
                type:"GET",
                data:{'matiere':matiere},
                success:function(data){
                    var qcm = data.qcm;
                    var html = '';
                    console.log(data);
                    // if(qcm.length > 0){
                    //     for(let i = 0; i<qcm.length; i++){
                    //         html += '<tr>\
                    //             <td>'+qcm[i]['nom']+'</td>\
                    //             <td><a href="/backoffice/chapitre/editchapitre/'+qcm[i]["id_matiere"]+'" class="btn btn-primary">Edit</a></td>\
                    //             </tr>';
                    //         console.log(matieres[i]['id_matiere']);
                    //     }

                    

                    // }
                    // else{
                    //     html += '<tr>\
                    //         <td>Pas de Matiere Trouvé</td>\
                    //         </tr>';
                    // }
                    $("#tbody").html(html);
                    
                }
            })
        })




    });

</script> 


@endsection