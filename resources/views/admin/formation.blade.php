@extends('layout.master')

@section('content')

@include('include.navadmin')
        <H1>Créer vos formations et leurs matières</H1>
                    <form class="" action="{{ url('/backoffice/formation/createFormationMatiere') }}" method="post">

                        @csrf

                        <input type="text" name="nomformation" placeholder="Nom de la Formation">

                        <label for="start">Date de début :</label>
                        <input type="date" id="start" name="date_debut"
                            value="2022-07-24"
                            min="2022-01-01" max="2060-12-31">

                        <label for="end">Date de Fin :</label>
                        <input type="date" id="end" name="date_fin"
                            value="2022-07-24"
                            min="2022-01-01" max="2060-12-31">

                            <div class="input-field">
                                <table class="table table-bordered" id="table_field1">
                                    <tr>
                                        <th>Nom de la matière</th>
                                        <th>Choisi un formateur</th>
                                        <th>Ajouter ou supprimer</th>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control" type="text" name="nommatiere[]" required=""></td>
                                        <td>
                                            <select class="form-control" name="id_formateur[]" >
                                                    <option value="">choisi formateur plus tard</option>
                                                @foreach ($selectformateur as $formateur)
        
                                                    <option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>
        
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="btn btn-warning" type="button" name="addd" id="addd" value="Ajouter"></td>
                                    </tr>
                                </table>
                                {{-- <center> --}}
                                    <div class="row">
                                        <div class="col-12 ps-0">
                                            <button  type="submit" class="btn btn-primary">Créer</button>
                                        </div>
                                    </div>
                                {{-- </center> --}}
                            </div>
                    </form>

                    <hr>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              
                              <td>Nom de la formation</td>
                              <td>Date debut de la formation</td>
                              <td>Date fin de la formation</td>
                              <td colspan = 2>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="accordion" id="accordionExample">
                            @foreach($getformations as $getformation)
                            {{-- @php
                            dd($getformations)
                            @endphp --}}
                            <tr>
                                <td>
                                    <h2 class="accordion-header" id="heading-{{ $getformation->id_formation }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" id="{{ $getformation->id_formation }}" data-bs-target="#collapse-{{ $getformation->id_formation }}" aria-expanded="true" aria-controls="collapse-{{ $getformation->id_formation }}">+
                                        </button>
                                      </h2>
                                     
                                    {{$getformation->nom}}
                                    <div id="collapse-{{ $getformation->id_formation }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $getformation->id_formation }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{-- @foreach ( $getmatieres as $getmatiere)
                                            {{ $getmatiere->nom }}
                                            @endforeach --}}
                                          
                                        </div>
                                      </div> </td>
                                <td>{{$getformation->date_debut}}</td>
                                <td>{{$getformation->date_fin}}</td>
                                <td>
                                    <a href="{{ route('admin.editformation', $getformation->id_formation) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('backoffice/formation/delete',$getformation->id_formation) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                      <button class="btn btn-danger" value="Delete" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                   







<script>
        
let html = '<tr><td><input class="form-control" type="text" name="nommatiere[]" required=""></td><td><select class="form-control" name="id_formateur[]" ><option value="">choisi formateur plus tard</option>@foreach ($selectformateur as $formateur)<option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>@endforeach</select></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';

$("#addd").click(function(){
            // if(x <= max){
            $("#table_field1").append(html);
            // x++;
        //}
        });
        
        $("#table_field1").on('click','#remove',function(){
            $(this).closest('tr').remove();
            // x--;
        })

       
        jQuery('.accordion-button').on('click',function(){
            var formationID = jQuery(this).attr('id');
            
            if(formationID)
            {
                jQuery.ajax({
                    url : '/backoffice/formation/showMatiere/' +formationID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        
                        jQuery("#collapse-"+formationID+" .accordion-body").empty();
                        jQuery.each(data, function(key,value){
                            $("#collapse-"+formationID+" .accordion-body").append(value.nom +" ");
                            
                        });
                    }
                });

                // async function test() {
                //     const res = await fetch('/backoffice/chapitre/getMatieres/' +formationID);
                //     const data = await res;
                //     console.log(data);
                // }
                // test();
            }
            else{
                $('select[name="id_matiere"]').empty();
            }
        });


</script>

@endsection