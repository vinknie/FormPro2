@extends('layout.master')

@section('content')


<h1>Editer les Chapitres de la matiere  {{ $matieres->nom }}</h1>

<form class="" action="{{ route('admin.updateChapitre') }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="input-field">
        <table class="table table-bordered" id="table_field1">
            <tr>
                <th>Nom du Chapitre</th>
                <th>Ajouter ou supprimer</th>
            </tr>
            @foreach ( $chapitres as $chapitre )
           
            <tr>
                <td>
                    <input type="hidden" name="id_matiere" value="{{ $chapitre->id_matiere }}">
                    <input type="hidden" name="id_chapitre[]" value="{{ $chapitre->id_chapitre }}"><!-- champ hidden pour recup les id matiere -->
                    <input class="form-control" type="text" name="nomchapitre[]" value="{{ $chapitre->nom }}">
                </td>

                <td>
                  
                    @if ($loop->first)
                    <input class="btn btn-warning" type="button" name="addd" id="addd" value="Ajouter">
                    @endif
                    <input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer">
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

let html = '<tr><td><input class="form-control" type="text" name="nomchapitre[]" required=""></td></select></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer"></td></tr>';
   
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
    //
});


</script>



@endsection