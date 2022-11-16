@extends('layout.master')

@section('content')


   {{-- @php
       dd($query);
   @endphp --}}
    <h1 class="text-center">Cours</h1>
    <div class="text-center">
        <select name="id_formation" >
            <option value="">--Selectionner une Formation--</option>
            @foreach ( $formations as $formation )
                <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
                
            @endforeach
        </select>
        <select name="id_matiere" id="id_matiere">
        </select>
    </div>
    
    <div class="row">
        <div class="col-2 bg-danger" id="listChapter"></div>
        <div class="col-1" ></div>
        <div class="col-9 bg-warning" id="CardChapter">
            {{-- <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-4 bg-danger"><span>Telecharger le PDF: </span><a href="#" class="card-link">PDF link</a></div>
                        <div class="col-1"></div>
                        <div class="col-4 bg-warning"><span>Visualiser le PDF: </span><a href="#" class="card-link">Visualiser</a></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-4 bg-warning"><span>Telecharger la Video: </span><a href="#" class="card-link">Video link</a></div>
                        <div class="col-1"></div>
                        <div class="col-4 bg-danger"><span>Visualisé la Vidéo: </span><a href="#" class="card-link">Video link</a></div>
                    </div>
                </div>
              </div> --}}
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
                    url : '/backoffice/fichier/getMatieres/' +formationID,
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
            console.log(matiere);
            $.ajax({
                url : '/cours/filterChapitre',
                type:"GET",
                data:{'matiere':matiere},
                success:function(data){
                    var chapitres = data.chapitre;
                    var html = '';
                    console.log(chapitres);
                    if(chapitres.length > 0){
                        for(let i = 0; i<chapitres.length; i++){
                            html += '<ul>\
                                <li>'+chapitres[i]['nom']+'</li>\
                                </ul>';
                            console.log(chapitres[i]['id_chapitre']);
                        }
                    }
                    else{
                        html += '<tr>\
                            <td>Pas de Chapitre Trouvé</td>\
                            </tr>';
                    }
                    $("#listChapter").html(html);
                    console.log(data);
                }
            })
        });
        $("#id_matiere").on('change',function(){
            var matiere = $(this).val();
            console.log(matiere);
            $.ajax({
                url : '/cours/filterChapitre',
                type:"GET",
                data:{'matiere':matiere},
                success:function(data){
                    var chapitres = data.chapitre;
                    var html = '';
                    console.log(chapitres);
                    if(chapitres.length > 0){
                        for(let i = 0; i<chapitres.length; i++){
                            html += '<div class="card">\
                <div class="card-body">\
                  <h5 class="card-title">'+chapitres[i]['nom']+'</h5>\
                  <p class="card-text">'+chapitres[i]['description']+'</p>\
                    <div class="row">\
                        <div class="col-3"></div>\
                        <div class="col-4 bg-danger"><span>Telecharger le PDF: </span><a href="#" class="card-link">PDF link</a></div>\
                        <div class="col-1"></div>\
                        <div class="col-4 bg-warning"><span>Visualiser le PDF: </span><a href="#" class="card-link">Visualiser</a></div>\
                    </div>\
                    <div class="row">\
                        <div class="col-3"></div>\
                        <div class="col-4 bg-warning"><span>Telecharger la Video: </span><a href="#" class="card-link">Video link</a></div>\
                        <div class="col-1"></div>\
                        <div class="col-4 bg-danger"><span>Visualisé la Vidéo: </span><a href="#" class="card-link">Video link</a></div>\
                    </div>\
                </div>\
              </div> ';
                            console.log(chapitres[i]['id_chapitre']);
                        }
                    }
                    else{
                        html += '<tr>\
                            <td>Pas de Chapitre Trouvé</td>\
                            </tr>';
                    }
                    $("#CardChapter").html(html);
                    console.log(data);
                }
            })
        });


    });
</script>

@endsection