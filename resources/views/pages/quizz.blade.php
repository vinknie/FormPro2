@extends('layout.master')

@section("content")
{{-- @php
    $values = explode("," , $qcm->Option);
    $valuesId = explode("," , $qcm->IdOption)
@endphp --}}

<div>
    <h1>Quizz {{ $qcm[0]->titre }} </h1>
</div>
@foreach ($qcm as $qcms)

    {{ $qcms->question }}<br>
    @php
        $values = explode("," , $qcms->Option);
        $valuesId = explode("," , $qcms->IdOption)
    @endphp
    <ul class="list-group">
        @foreach (array_combine($values, $valuesId) as $value => $id )

        <li class="list-group-item mb-1"><input class="form-check-input me-1" type="checkbox" id="{{ $id }}" name="checkbox[]">{{ $value }}</li>
        @endforeach
    </ul>
@endforeach


@endsection