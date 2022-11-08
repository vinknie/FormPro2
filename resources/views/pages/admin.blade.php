@extends('layout.master')

@section('content')
    

    <div class="allcontain">
        <div class="vertical-menu">
            <a href="#" class="active">Admin</a>
            <a class="click" target ="1">Formation</a>
            <a class="click" target ="2">Chapitre</a>
            <a class="click" target="3">Fichier</a>
            <a class="click" target ="4">Examen</a>
            <a class="click" target ="5">Presence</a>
            <a class="click" target ="6">Satisfaction</a>
            <a class="click" target ="7">Profil</a>
            <a class="click" target ="8">Résultats</a>
        </div>

        <div id="containtadmin">

                <div id="div1" class="target">
                    <h1>Créer une formation</h1>
                    <form class="" action="{{ url('/admin/create_formation') }}" method="post">

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
                        {{-- <center> --}}
                        <div class="row">
                            <div class="col-12 ps-0">
                                <button  type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                        {{-- </center> --}}
                    </form>


                    <form class="" action="{{ url('/admin/create_matiere') }}" method="post">
                        @csrf
                        <hr>
                        <h1 class="text-center">Ajouter une Matière</h1>
                        <hr>
                        <select name="id_formation" >
                            <option value="">--Choisi une formation--</option>
                            @foreach ($selectformation as $formation)

                                <option value="{{ $formation->id_formation }}"> {{ $formation->nom }} {{ $formation->date_complet }} </option>

                            @endforeach
                        </select>
                        
                        <div class="input-field">
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Nom de la matière</th>
                                    <th>Choisi un formateur</th>
                                    <th>Ajouter ou supprimer</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" name="nommatiere[]" required=""></td>
                                    <td>
                                        <select class="form-control" name="id_formateur[]" >
                                            @foreach ($selectformateur as $formateur)

                                                <option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>

                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="btn btn-warning" type="button" name="add" id="add" value="Ajouter"></td>
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
                    <H1>Créer vos formations et leurs matières</H1>
                    <form class="" action="{{ url('/admin/create_all') }}" method="post">

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
                            @foreach($getformations as $getformation)
                            <tr>
                                <td>{{$getformation->nom}} </td>
                                <td>{{$getformation->date_debut}}</td>
                                <td>{{$getformation->date_fin}}</td>
                                <td>
                                    <a href="{{ route('pages.edit', $getformation->id_formation) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/admin/delete',$getformation->id_formation) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                      <button class="btn btn-danger" value="Delete" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div id="div2" class="target">
                    <form class="" action="{{ url('/admin/create_chapitre') }}" method="post">
                        @csrf
                        <hr>
                        <h1 class="text-center">Ajouter un Chapitre</h1>
                        <hr>
                        <select name="id_formation" >
                            <option value="">--Choisi une formation--</option>
                            @foreach ($selectformation as $formation)

                                <option value="{{ $formation->id_formation }}"> {{ $formation->nom }} {{ $formation->date_complet }} </option>

                            @endforeach
                        </select>
                        <select name="id_matiere" >
                            <option value="">--Choisi une Matiere--</option>
                            @foreach ($selectmatiere as $matiere)

                                <option value="{{ $matiere->id_matiere }}"> {{ $matiere->nom }} </option>

                            @endforeach
                        </select>
                        
                        
                        <div class="input-field">
                            <table class="table table-bordered" id="table_field2">
                                <tr>
                                    <th>Nom de la matière</th>
                                    <th>Ajouter ou supprimer</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" name="nommatiere[]" required=""></td>
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
                </div>

                <div id="div3" class="target">
                    <h1>Ajouter Files</h1>
                     <!-- upload de fichier -->

                    <form action="{{ url('/admin/uploadfile') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="text" name="name" placeholder="Nom du fichier">
                        <input type="text" name="description" placeholder="Description du fichier">
                        <input type="file" name="file">
                        <input type="text" name="extension" placeholder="Extension du fichier">
                        <input type="submit">

                    </form>
                </div>
                
                <div id="div4" class="target">
                    <h1>Section QCM</h1>
                     <!-- Creation QCM -->

                    <form action="{{ route('create_qcm') }}" method="post">

                        @csrf

                        <input type="text" name="question" placeholder="Question ? ">
                        <input type="text" name="reponse1" placeholder="choix 1 ">
                        <input type="text" name="reponse2" placeholder="choix 2 ">
                        <input type="text" name="reponse3" placeholder="choix 3 ">
                        <input type="text" name="reponse4" placeholder="choix 4 ">
                        <input type="submit">

                    </form>
                </div>

                <div id="div5" class="target">
                    <h1>Valider les présences</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptate, voluptates reprehenderit ut in possimus provident, atque debitis voluptatibus quae blanditiis perferendis vel earum. Necessitatibus molestiae quis qui natus nulla!</p>
                </div>

                <div id="div6" class="target">
                    <h1>Voir les satisfactions et les avis</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptate, voluptates reprehenderit ut in possimus provident, atque debitis voluptatibus quae blanditiis perferendis vel earum. Necessitatibus molestiae quis qui natus nulla!</p>
                </div>

                <div id="div7" class="target">
                    <h1>Mettre a jour les profils</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptate, voluptates reprehenderit ut in possimus provident, atque debitis voluptatibus quae blanditiis perferendis vel earum. Necessitatibus molestiae quis qui natus nulla!</p>
                </div>

                <div id="div8" class="target">
                    <h1>Mettre a jour les résultats</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptate, voluptates reprehenderit ut in possimus provident, atque debitis voluptatibus quae blanditiis perferendis vel earum. Necessitatibus molestiae quis qui natus nulla!</p>
                </div>
                <div id="div7" class="target">
                    <h1>Créer une formation</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptate, voluptates reprehenderit ut in possimus provident, atque debitis voluptatibus quae blanditiis perferendis vel earum. Necessitatibus molestiae quis qui natus nulla!</p>
                </div>
                
        </div>
          
    </div>


    <!-- Script pour admin -->
    
    <script>
        

        let html = '<tr><td><input class="form-control" type="text" name="nommatiere[]" required=""></td><td><select class="form-control" name="id_formateur[]" >@foreach ($selectformateur as $formateur)<option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>@endforeach</select></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';
       
        let html2 = '<tr><td><input class="form-control" type="text" name="nommatiere[]" required=""></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>'
        // Maximun de input ajoutable !
        // var max = 5;
        // var x = 1;

        $("#add").click(function(){
            // if(x <= max){
            $("#table_field").append(html);
            // x++;
        //}
        });
        
        $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
            // x--;
        })


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

        $("#adddd").click(function(){
            // if(x <= max){
            $("#table_field2").append(html2);
            // x++;
        //}
        });
        
        $("#table_field2").on('click','#remove',function(){
            $(this).closest('tr').remove();
            // x--;
        })
    

    </script>

@endsection