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
                <option id='test' value="">--Choisi une Matiere--</option>
            </select>

            {{-- <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Titre du QCM</th> 
                    <th>Chapitre</th>
                    <td colspan = 3>Action</td>
                </tr>
                </thead>
                <tbody id="tbody">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                
                </tbody>
            </table> --}}
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
            <div class="row">
                <div class="col-6">
                    <h3>Titre Du Qcm</h3>   
                </div>
                <div class="col-3">
                    <h3>Chapitre</h3> 
                </div>
                <div class="col-3">
                    <h3>Actions</h3> 
                </div>
            </div>
            <div id="tbody">

            </div>
            
        </div>
    </div>
















<script>
  const test = document.getElementById('test');
  test.addEventListener('click', function(e){
    

    // $('#tbody').empty();
    console.log('hi');
    })
//   function test(count, key, value) {

//   }
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

        $("#id_matiere").on('change',function(){
            var matiere = $(this).val();
            $.ajax({
                url : '/backoffice/qcm/viewQcm/filterMatiere',
                type:"GET",
                data:{'matiere':matiere},
                success:function(data){
                    var qcm = data.qcm;
                    var html = '';
                    console.log(data);
                    if(qcm.length > 0){
                        for(let i = 0; i<qcm.length; i++){
                            let url = "backoffice/qcm/viewQcm/editQcm/"+qcm[i]["id_qcm"];
                            console.log(url);
                            html += '<form class="" action="http://localhost:8000/'+url+'" method="post" enctype="multipart/form-data">\
                                @csrf\
                                        <div class="row">\
                                            <div class="col-6">\
                                                <input class="titreinputs" name="titre" value="'+qcm[i]['titre']+'" disabled>\
                                            </div>\
                                            <div class="col-3">\
                                                <p>'+qcm[i]['nom']+'</p>\
                                            </div>\
                                            <div class="col-3 append">\
                                                    <button class="btn btn-primary editbuttons">Edit</button>\
                                            </div>\
                                        </div>\
                                    </form>';

                        }

                    }
                    else{
                        html += '<div>\
                            <p>Pas de QCM pour cette Matiere</p>\
                            </div>';
                    }
                    $("#tbody").html(html);
                    
                }
            })
        })

    });

        
    document.body.addEventListener('click', function(e) {
        const edit = document.querySelectorAll('.editbuttons');
        const input = document.querySelectorAll('.titreinputs');
        const append = document.querySelectorAll('.append')
        const button = document.createElement('button');
        button.innerText= "Valider"
        button.setAttribute('type', 'submit');
        

            edit.forEach(function (btn, i){
                btn.addEventListener('click',function(k){
                    input[i].removeAttribute('disabled');
                    edit[i].classList.add('d-none');     
                    
                    
                    append.forEach(function (el, j){
                        el.appendChild(button);
                    })
                    
                    
                 
                })
            });
            
    })



</script> 


@endsection