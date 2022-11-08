@extends('layout.master')

@section('content')
    <h1>Register</h1>

    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="POST" action="{{ route('register.action') }}">
            @csrf
            <div class="mb-3">
                <label>Nom<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="nom" value="{{ old('nom') }}" />
            </div>
            <div class="mb-3">
                <label>Prénom<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="prenom" value="{{ old('prenom') }}" />
            </div>
            <div class="mb-3">
                <label>Age<span class="text-danger">*</span></label>
                <input class="form-control" name="age" value="{{ old('age') }}" />
            </div>
            <div class="mb-3">
                <label>E-Mail<span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label>Status<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="status" value="{{ old('status') }}" />
            </div>
            <div class="mb-3">
                <label>Roles<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="role" value="{{ old('role') }}" />
            </div>
            <div class="mb-3">
                <label>Nom d'utilisateur<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Mot de Passe<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label>Confirmer le Mot de Passe<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirmation" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                <a class="btn btn-danger" href="{{ route('pages.index') }}">Back</a>
            </div>
        </form>
    </div>


@endsection