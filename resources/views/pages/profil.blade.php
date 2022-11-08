@extends('layout.master')

@section('content')

<p>Votre Profil : {{ Auth::user()->nom}}</p>

@endsection