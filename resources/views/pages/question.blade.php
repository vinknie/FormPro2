@extends('layout.master')

@section('content')

<h1 class="text-center">QCM</h1>

<div class="text-center">
    <select name="id_formation" id="id_formation">
        <option value="">Select Formation</option>
        @if(isset($formations))
            @foreach ($formations as $formation )
                <option value="{{ $formation['id_formation'] }}">{{ $formation->nom }}</option>
            @endforeach
        @elseif(isset($formationsUser))
            @foreach ($formationsUser as $formation )
                <option value="{{ $formation->id_formation }}">{{ $formation->nomForm }}</option>
            @endforeach
        @endif
    </select>
    <select name="id_matiere" id="id_matiere" >
        <option id='test' value="">--Choisi une Matiere--</option>
    </select>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8" id="CardChapter">
    <div class="col-2"></div>
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
                    url : '/examen/qcm/getMatiereUser/' +formationID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        
                        jQuery('select[name="id_matiere"]').find('option').not(':first').remove();
                        
                        // let count = 0 ;

                        jQuery.each(data, function(key,value){
                            // $('select[name="id_matiere"]').append("<option value="">--Choisi une Matiere--</option>"); 
                            $('select[name="id_matiere"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });

            }
            else{
                $('select[name="id_matiere"]').find('option').not(':first').remove();
            }
        });
        $("#id_matiere").on('change', function() {
                var matiere = $(this).val();
                console.log(matiere);
                $.ajax({
                    url: '/examen/qcm/filterChapiter',
                    type: "GET",
                    data: {
                        'matiere': matiere
                    },
                    success: function(data) {
                        var chapitres = data.chapitre;
                        var html2 = '';
                        console.log(data);
                        if (chapitres.length > 0) {
                            for (let i = 0; i < chapitres.length; i++) {

                                if (chapitres[i]['IdQcm'] != null){

                                    const IdQcmSplit = chapitres[i]['IdQcm'].split(",");
                                    const TitreQcmSplit = chapitres[i]['TitreQcm'].split(",");
                                    const ActifQcmSplit = chapitres[i]['ActifQcm'].split(",");
                                    html2 += '<div class="card">\
                                    <div class="card-body">\
                                        <h5 class="card-title">'+chapitres[i]['nom']+'</h5>\
                                        <p class="card-text">'+chapitres[i]['description']+'</p>'
                                    for (let j = 0; j < IdQcmSplit.length; j++){
                                        if(ActifQcmSplit[j] == 1)
                                            html2 += '<div class="row">\
                                                            <div class="col-3"></div>\
                                                                <div class="col-4">\
                                                                    <input type="hidden" name="id" value="'+IdQcmSplit[j]+'">\
                                                                    <span>Acceder Au Qcm '+TitreQcmSplit[j]+': </span><a href="/examen/qcm/'+IdQcmSplit+'" class="card-link">Quizz</a>\
                                                                </div>\
                                                        </div>'   
                                    }
                                    html2 +='</div>\
                                        </div>';
                                }else{
                                    html2 += '<div class="card">\
                                    <div class="card-body" >\
                                        <h5 class="card-title">'+chapitres[i]['nom']+'</h5>\
                                        <p class="card-text">'+chapitres[i]['description']+'</p>\
                                    </div>\
                                    </div>';
                                }

                            }

                        }$("#CardChapter").html(html2);
                    }
                })
            });
    });
</script>

@endsection