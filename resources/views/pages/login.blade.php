@extends('layout.master')

@section('content')
    <h1>Login</h1>

    <div class="col-md-6">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="POST" action="{{ route('login.action') }}">
            @csrf
            <div class="mb-3">
                <label>Nom d'utilisateur<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Mot de Passe<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
                <a class="btn btn-danger" href="{{ route('pages.index') }}">Back</a>
            </div>
        </form>
    </div>


@endsection