@extends('layout.master')

@section('content')


<table border="1px">

    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Visualisé</th>
        <th>Télécharger</th>
    </tr>

    @foreach ($data as $data)

    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->description }}</td>
        <td><a href="{{ url('/view', $data->id) }}">Voir</a></td>
        <td><a href="{{ url('/download' , $data->file) }}">Télécharger</a></td>
    </tr>


        
    @endforeach

</table>

@endsection