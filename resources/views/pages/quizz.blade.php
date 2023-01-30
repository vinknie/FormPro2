@extends('layout.master')
<style>
    .correct{
        background: green;
    }
    .wrong{
        background: red;
    }
</style>
@section("content")


<form id="quizz-form" class="" action="{{ route('submitQuizz' , $qcm[0]->id_qcm) }}" method="post" enctype="multipart/form-data" >
    @csrf
<div>
    <h1>Quizz {{ $qcm[0]->titre }} </h1>
</div>

@foreach ($qcm as $qcms)
    <div style="display: flex">
         {{ $qcms->question }} / 
         Point des bonnes réponses : {{ $qcms->points }}
    </div>
   
    @php
        $values = explode("," , $qcms->Option);
        $valuesId = explode("," , $qcms->IdOption);
        $correct = explode("," , $qcms->Correct);
        
    @endphp
   <ul class="list-group">
    {{-- @dd($qcms) --}}
    @foreach (array_combine($values, $valuesId) as $value => $id )
        <li class="list-group-item mb-1">
            <input class="form-check-input me-1" type="checkbox" id="{{ $id }}" name="answers[{{$qcms->id_question}}][]" value="{{ $id }}">
            <label for="{{ $id }}">{{ $value }}</label>
        </li>
    @endforeach
</ul>
@endforeach
<input type="submit" value="submit" name="test">
</form>



@endsection