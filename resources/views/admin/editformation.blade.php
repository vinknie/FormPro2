@extends('layout.master')

@section('content')

@include('include.navadmin')
<h1>Editer la formation</h1>

<form class="" action="{{ route('admin.update' ,$getformation->id_formation)}}" method="post" enctype="multipart/form-data">

    @csrf

    <input type="text" name="nomformation" value="{{ $getformation->nom }}">

    <label for="start">Date de début :</label>
    <input type="date" id="start" name="date_debut"
        value="{{ $getformation->date_debut }}"
        min="2022-01-01" max="2060-12-31">

    <label for="end">Date de Fin :</label>
    <input type="date" id="end" name="date_fin"
        value="{{ $getformation->date_fin }}"
        min="2022-01-01" max="2060-12-31">

        <div class="input-field">
            <table class="table table-bordered" id="table_field1">
                <tr>
                    <th>Nom de la matière</th>
                    <th>Choisi un formateur</th>
                    <th>Ajouter ou supprimer</th>
                </tr>
                @foreach ( $getmatieres as $getmatiere )
                <tr>
                    <td>
                        <input type="hidden" name="id_matiere[]" value="{{ $getmatiere->id_matiere }}"><!-- champ hidden pour recup les id matiere -->
                        <input class="form-control" type="text" name="nommatiere[]" value="{{ $getmatiere->nom }}">
                    </td>
                    <td>
                        <select class="form-control" name="id_formateur[]" >
                            @foreach ($selectformateur as $formateur)
                                
                                @if(!empty($getmatiere->id_utilisateurs) && $getmatiere->id_utilisateurs == $formateur->id)
                                <option value="{{ $formateur->id }}" selected> {{ $formateur->nom_complet }} </option>
                                @else
                                <option value="{{ $formateur->id }}" > {{ $formateur->nom_complet }} </option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td>
                      
                        @if ($loop->first)
                        <input class="btn btn-warning" type="button" name="addd" id="addd" value="Ajouter">
                        @endif
                        <a href="{{ URL::to('backoffice/formation/editformation/delete' ,$getmatiere->id_matiere) }}" data-method="delete" >
                        <input class="btn btn-danger" type="button" name="remove" id="remove" value="Supprimer"></a>
                    </td>
                        
                </tr>
                @endforeach
            </table>
            <center>
<div class="row">
    <div class="col-12 ps-0">
         <button  type="submit" value="submit" class="btn btn-primary">Modifier</button>
    </div>
</center>
</div>


<script>
        

    let html = '<tr><td><input class="form-control" type="text" name="nommatiere[]" required=""></td><td><select class="form-control" name="id_formateur[]" >@foreach ($selectformateur as $formateur)<option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>@endforeach</select></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';
   
    // Maximun de input ajoutable !
    // var max = 5;
    // var x = 1;

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


</script>


@endsection