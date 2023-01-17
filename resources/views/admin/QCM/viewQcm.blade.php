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
                    <th>Titre Qcm</th> 
                    <th>Chapitre</th>   
                    <td colspan = 2>Action</td>
                </tr>
                </thead>
                <tbody id="tbody">
              
                </tbody>
            </table>
            {{-- @if(session('success'))
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
            <div id="tbody"> --}}
                <!-- Button trigger modal -->
  
  <!-- Modal -->
 
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
                    console.log(qcm);
                    if(qcm.length > 0){
                        for(let i = 0; i<qcm.length; i++){
                           
                            html += '<tr>\
                                <td>'+qcm[i]['titre']+'</td>\
                                <td>'+qcm[i]['nom']+'</td>\
                                <td><a href="/backoffice/qcm/viewQcm/editQcm/'+qcm[i]["id_qcm"]+'" class="btn btn-primary" id="editbutton">Edit</a></td>\
                                <td><a href="/backoffice/qcm/viewQcm/deleteQcm/'+qcm[i]["id_qcm"]+'" class="btn btn-danger" onclick="return confirm("Etes vous sur de vouloir Supprimé!?")" data-method="delete"><i class="fa fa-times"></td>\
                                <td>'
                                console.log(qcm[i]["actif"] )
                                if(qcm[i]["actif"] === 0){
                                    html += '<a href="/backoffice/qcm/viewQcm/changeActif/'+qcm[i]["id_qcm"]+'" class="btn btn-danger" id="inactif" onclick="return confirm("Etes vous sur de vouloir rendre le QCM Actif!?")"><i class="fa-solid fa-lock"></i></a>'
                                }else{
                                    html += '<a href="/backoffice/qcm/viewQcm/changeActif/'+qcm[i]["id_qcm"]+'" class="btn btn-success" id="actif" onclick="return confirm("Etes vous sur de vouloir rendre le Qcm Inactif!?")"><i class="fa-solid fa-unlock"></i></a>'
                                }
                                '</td>\
                                </tr>';

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

        
    // document.body.addEventListener('click', function(e) {
    //     const edit = document.querySelectorAll('.editbuttons');
        // const input = document.querySelectorAll('.titreinputs');
        // const append = document.querySelectorAll('.append')
        // const button = document.createElement('button');
        // button.innerText= "Valider"
        // button.setAttribute('type', 'submit');
        // e.preventDefault();

            // edit.forEach(function (btn, i){
            //     btn.addEventListener('click',function(k){
            //         input[i].removeAttribute('disabled');
            //         edit[i].classList.add('d-none');     
                    
                    
            //         append.forEach(function (el, j){
            //             el.appendChild(button);
            //         })
                    
                    
                 
            //     })
            // });
            
    // })



</script> 


{{-- 
@if(isset($_GET['editQcm'])) 
        <form class="" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="labels">Option</label>
                            <input type="text" class="form-control input" name="option[]" value="{{ }}" >
                    
                        <button id="btncreate" type="submit" class="btn btn-success">Modifier</button>    
                    </form>

 @endif --}}
@endsection