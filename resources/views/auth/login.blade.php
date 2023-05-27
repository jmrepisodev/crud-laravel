@extends('layouts.plantilla')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mb-3 d-flex align-items-center justify-content-center">
    <div class="col-sm-8">
        <div class="card rounded-3 m-3" >
            <div class="row g-0">
                <div class="card-header text-center text-white fw-bold fs-3 p-3 bg-dark">Login</div>
                <div class="col-md-4 mx-auto" style="max-width:220px;">
                    <img src="{{ asset('img/logo-laravel.png') }}" class="img-fluid rounded mx-auto d-block p-3"  alt="logo">
                </div>
                <div class="col-md-8 border-start">
                    <div class="card-body">
                        <form action="{{ route('login.autenticar') }}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" placeholder="Introduce tu email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" placeholder="Introduce tu contraseña" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Recuérdame</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success p-3 mb-3" style="width:100%;">Login</button>
                            <p>¿Aún no tienes una cuenta? <a href="{{ route('register') }}">Registrar</a></p>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

