@extends('layout.master')

@section("content")
@php
    $values = explode("," , $qcm[0]->Option)
@endphp
<div>
    <h1>Quizz {{ $qcm[0]->titre }} </h1>
</div>
{{ $qcm[0]->question }}<br>
<ul class="list-group">
@foreach ($values as $value )

<li class="list-group-item mb-1"><input class="form-check-input me-1" type="checkbox" id="" name="">{{ $value }}</li>
@endforeach
</ul>
{{-- 
@dd($qcm); --}}

@endsection