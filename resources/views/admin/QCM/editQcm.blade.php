@extends('layout.master')


@section('content')
    @include('include.navadmin')

    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>
        <div class="col-9">
            <h1>Modifier le QCM</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form class="" action="{{ route('admin.QCM.updateQcm', $getQcm->id_qcm) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="labels">Titre</label>
                <input class="form-control" type="text" name="titre" value="{{ $getQcm->titre }}">

                <button id="btncreate" type="submit" class="btn btn-success">Modifier</button>    
            </form>
        </div>





    </div>

@endsection