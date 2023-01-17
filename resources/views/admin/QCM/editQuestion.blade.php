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
                    @if(session('successOption'))
                    <div class="alert alert-success">
                        {{ session('successOption') }}
                    </div>
                    @endif
                    <form class="" action="{{ route('admin.QCM.updateOption') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($getOption as $option)
                        <label class="labels">Option</label>
                        @if($getQuest->type == 'truefalse')
                            <input type="hidden" name="id_question" value="{{ $option->id_question }}">
                            <input type="hidden" name="id_option[]" value="{{ $option->id_option }}">
                            <input type="text" class="form-control input" name="option[]" value="{{ $option->option }}" readonly="readonly">
                        @else
                            <input type="hidden" name="id_question" value="{{ $option->id_question  }}">
                            <input type="hidden" name="id_option[]" value="{{ $option->id_option }}">
                            <input type="text" class="form-control input" name="option[]" value="{{ $option->option }}" >
                        @endif
                        @if($option->correct == 1)
                            <input type="hidden" name="id_question" value="{{ $option->id_question  }}">
                            <input type="hidden" name="id_option[]" value="{{ $option->id_option }}">
                            <select class="form-control" name="correct[]">
                                <option value="{{ $option->correct }}">Bonne réponse</option>
                                <option value="0">Mauvaise Reponse</option>
                            </select>
                        @else
                            <input type="hidden" name="id_question" value="{{ $option->id_question  }}">
                            <input type="hidden" name="id_option[]" value="{{ $option->id_option }}">
                            <select class="form-control" name="correct[]">
                                <option value="{{ $option->correct }}">Mauvaise Reponse</option>
                                <option value="0">Bonne réponse</option>
                            </select>
                        @endif
                  
                         
                        @endforeach
                        
                        <button id="btncreate" type="submit" class="btn btn-success">Modifier</button>    
                    </form>
                </div>
            </div>
        </div>





    </div>

    <script>

        document.body.addEventListener('click', function(e) {
          
            const input = document.querySelectorAll('.input')
            const check = document.querySelectorAll('.check')
            if (e.target.classList.contains('check')) {

                for (let i = 0; i < check.length; i++) {
                    check[i].addEventListener('change', function(e) {
                        if (this.checked) {
                            this.value = input[i].value
                            
                        } else {
                            this.value = ''
                        }
                        console.log(this.value);
                    });

                   
                }
            }
            // if (e.target.classList.contains('check')) 
            // for (let i = 0; i < check.length; i++) {
            // input[i].addEventListener('keypress', function(k){
            //             if (check[i].checked = true){
            //                 check[i].value = input[i].value
            //                 this.value = this.value 
            //                 console.log(this.value)
            //             }
                        
            //                 })
            //             }
        });
        
        $(document).ready(function(e) {
            const input = document.querySelectorAll('.input')
            const check = document.querySelectorAll('.check')
            console.log(e)
        
            for (let i = 0; i < check.length; i++) {
            input[i].addEventListener('keypress', function(k){
                        if (check[i].checked = true){
                            check[i].value = input[i].value
                            this.value = input[i].value
                            console.log(k.target.value)
                        }
                        
                            })
                        }
});

    </script>

@endsection