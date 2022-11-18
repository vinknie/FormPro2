@extends('layout.master')

@section('content')




   
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
            <h4>Veuillez Selectionner la formation Puis la Matiere que vous souhaitez pour avoir access aux chapitres de la Matiere</h4>
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
           
            $.ajax({
                url : '/cours/filterChapitre',
                type:"GET",
                data:{'matiere':matiere},
                success:function(data){
                    console.log(data);
                    var chapitres = data.chapitre;
                    var html = '';
                    
                    if(chapitres.length > 0){
                        for(let i = 0; i<chapitres.length; i++){
                            html += '<ul>\
                                <li>'+chapitres[i]['nom']+'</li>\
                                </ul>';
                        }
                    }
                    else{
                        html += '<tr>\
                            <td>Pas de Chapitre Trouvé</td>\
                            </tr>';
                    }
                    $("#listChapter").html(html);
                    
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
                    console.log(data);
                    if(chapitres.length > 0){
                        for(let i = 0; i<chapitres.length; i++){
                            const IdFilesSplit = chapitres[i]['IdFiles'].split(",");
                            const FileFilesSplit = chapitres[i]['FileFiles'].split(",");
                            const NameFilesSplit = chapitres[i]['NameFiles'].split(",");
                            const ExtFilesSplit = chapitres[i]['ExtFiles'].split(",");
                           
                            // console.log(IdFilesSplit);
                            // console.log(NameFilesSplit);
                            // console.log(ExtFilesSplit);
                            
                            html += '<div class="card">\
                                <div class="card-body" >\
                                    <h5 class="card-title">'+chapitres[i]['nom']+'</h5>\
                                    <p class="card-text">'+chapitres[i]['description']+'</p>'
                                    for(let j=0; j<IdFilesSplit.length;j++){
                                                console.log(FileFilesSplit[j]);
                                                if(ExtFilesSplit[j] == 'pdf'){
                                                    html +='<div class="row">\
                                                    <div class="col-3"></div>\
                                                    <div class="col-4 bg-danger">\
                                                        <input type="hidden" name="id" value="'+IdFilesSplit[j]+'">\
                                                        <span>Telecharger le PDF '+NameFilesSplit[j]+': </span><a href="'+FileFilesSplit[j]+'" class="card-link">PDF link</a></div>\
                                                    <div class="col-1"></div>\
                                                    <div class="col-4 bg-warning"><span>Visualiser le PDF: </span><a href="#" class="card-link">Visualiser</a></div>\
                                            </div>'
                                                }else if(ExtFilesSplit[j]  == 'mp4'){
                                                    html +='<div class="row">\
                                                    <div class="col-3"></div>\
                                                    <div class="col-4 bg-danger">\
                                                        <input type="hidden" name="id" value="'+IdFilesSplit[j]+'">\
                                                        <span>Telecharger la Video '+NameFilesSplit[j]+': </span><a href="/cours/downloadFile/'+FileFilesSplit[j]+'" class="card-link">Video link</a></div>\
                                                    <div class="col-1"></div>\
                                                    <div class="col-4 bg-warning"><span>Visualiser la  video: </span><a href="#" class="card-link">Visualiser</a></div>\
                                            </div>'
                                                }else{
                                                    html += ''
                                                }
                                                
                                            }
                             html+=     '</div>\
                                    </div>' ;       
                        }
                    }
                    else{
                        html += '<tr>\
                            <td>Pas de Chapitre Trouvé</td>\
                            </tr>';
                    }
                    $("#CardChapter").html(html);
                    
                   
                }
            })
        });


    });
</script>

@endsection