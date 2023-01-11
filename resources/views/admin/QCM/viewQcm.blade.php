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

            <table class="table table-bordered">
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
            </table>
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
                            html += '<tr>\
                                    <form class="" action="'+url+'" method="post" enctype="multipart/form-data">\
                                        <td><input class="titreinputs" name="titre" value="'+qcm[i]['titre']+'" disabled></td>\
                                        <td>'+qcm[i]['nom']+'</td>\
                                        <td><button class="btn btn-primary editbuttons">Edit</button> <button  type="submit" value="submit" class="btn btn-primary">Modifier</button></td>\
                                    </form>\
                                </tr>';

                        }

                    

                    }
                    else{
                        html += '<tr>\
                            <td>Pas de QCM pour cette Matiere</td>\
                            </tr>';
                    }
                    $("#tbody").html(html);
                    
                }
            })
        })

    });

        
    document.body.addEventListener('click', function(e) {
        const edit = document.querySelectorAll('.editbuttons');
        const input = document.querySelectorAll('.titreinputs');
        const submit = document.querySelector('#form-submit');
        e.preventDefault();

            edit.forEach(function (btn, i){
                 btn.addEventListener('click',function(){
                    input[i].removeAttribute('disabled');
                })
           
            // submit.classList.remove('d-none');
            // edit.classList.add('d-none');
            });

            // for(let i=0 ; i<edit.length ; i++){
            //     edit[i].addEventListener('click', function(i){
            //         console.log(i);
            //     }.bind(null,i))
            // }
    })



</script> 


@endsection