@extends('layout.master')

@section('content')
@auth
<p>Votre Profil : {{ Auth::user()->id}}</p>
@php
    dd($userFormation);
@endphp
@endauth


@endsection