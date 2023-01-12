@extends('layout.master')


@section('content')
    @include('include.navadmin')

    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>
        <div class="col-9">
            <h1>Modifier la Question et les Options</h1>
            <div class="row">
                <div class="col-6">
                    <h3>Question: </h3>
                    @if(session('successQuestion'))
                    <div class="alert alert-success">
                        {{ session('successQuestion') }}
                    </div>
                    @endif
                    <form class="" action="{{ route('admin.QCM.updateQuestion', $getQuest->id_question) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="labels">Question?</label>
                        <input class="form-control" type="text" name="question" value="{{ $getQuest->question }}">

                        <label class="labels">Point de la question</label>
                        <input class="form-control" type="text" name="points" value="{{ $getQuest->points }}">
                        
                        <button id="btncreate" type="submit" class="btn btn-success">Modifier</button>    
                    </form>
                </div>
                <div class="col-6">
                    <h3>Option: </h3>
                    <form class="" action="{{ route('admin.QCM.updateOption') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($getOption as $option)
                        <label class="labels">Option</label>
                        @if($getQuest->type == 'truefalse')
                            <input type="text" class="form-control input" name="option[]" value="{{ $option->option }}" readonly="readonly">
                        @else
                            <input type="text" class="form-control input" name="option[]" value="{{ $option->option }}" >
                        @endif
                        @if($option->correct == 1)
                            <input class="form-check-input check" type="checkbox" name="correct[]" value="{{ $option->correct }}" id="flexCheckDefault" checked> 
                        @else
                            <input class="form-check-input check" type="checkbox" name="correct[]" value="{{ $option->correct }}" id="flexCheckDefault"> 
                        @endif
                  
                         
                        @endforeach
                        
                        <button id="btncreate" type="submit" class="btn btn-success">Modifier</button>    
                    </form>
                </div>
            </div>
        </div>





    </div>

@endsection