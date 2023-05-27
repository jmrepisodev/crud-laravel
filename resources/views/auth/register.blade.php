
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

<div class="row d-flex justify-content-center align-items-center">
    <div class="col-sm-8">
        <div class="card rounded-3 m-3">
            <div class="row">
                <div class="col-sm-12">
                <div class="card-header text-center text-white fw-bold fs-3 p-3 bg-dark">Registrar</div>
                    <div class="card-body p-md-5 mx-md-4">
        
                        <form method='post' action='{{ route("register.store") }}'>
                        @csrf   
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-user fa-lg"></i></span>
                                <input placeholder="Nombre" type="text" name="name" class="form-control p-2" id="name" pattern="[a-zA-Z- ]*" title="Solo está permitido letras, guiones o espacios">
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-envelope fa-lg"></i></span>
                                <input type="email" name="email" placeholder="Email" class="form-control p-2" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-key fa-lg"></i></span>
                                <input type="password" name="password" placeholder="Password" class="form-control p-2" id="password" >
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fa fa-key fa-lg"></i></span>
                                <input type="password" name="password_confirmation" placeholder="Confirmar password" class="form-control p-2" id="password_confirmation" >
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="legals" value="checked" class="form-check-input" id="legals">
                                <label class="form-check-label" for="legals">Acepto los términos y condiciones</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-danger mb-3 p-3" style="width:100%;">Registrar</button>
                            <p>¿Ya tienes una cuenta? <a href='{{ route("login") }}'>Login</a></p>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection



