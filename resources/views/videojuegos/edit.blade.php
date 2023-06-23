@extends('layouts.plantilla')

@section('content')

    
    <div class='row'>
        <div class='col-sm-8 offset-sm-2'>
        <h1 class='display-3'>Editar videojuego</h1>
   
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @isset($videojuego)
            <form action="{{ route('videojuegos.update',$videojuego->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="row">
                    <div class='form-group mb-3'>
                        <label for='id'>ID:</label>
                        <input id="id" type='number' value="{{ $videojuego->id}}" class='form-control' name='id' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='isan'>ISAN:</label>
                        <input id="isan" type='text' value="{{ $videojuego->isan}}" class='form-control' name='isan' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='titulo'>Título:</label>
                        <input id="titulo" type='text' value="{{ $videojuego->titulo}}" class='form-control' name='titulo' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='desarrollador'>Desarrollador:</label>
                        <input id="desarrollador" type='text' value="{{ $videojuego->desarrollador}}" class='form-control' name='desarrollador' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='distribuidor'>Distribuidor:</label>
                        <input id="distribuidor" type='text' value="{{ $videojuego->distribuidor}}" class='form-control' name='distribuidor' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='genero'>Género:</label>
                        <input id="genero" type='text' value="{{ $videojuego->genero}}" class='form-control' name='genero' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='imagen'>Imagen:</label>
                        <input id="imagen" type='file' class='form-control' name='imagen' />
                    </div>
                    <div class='form-group mb-3'>
                        <label for='precio'>Precio:</label>
                        <input id="precio" type='number' class='form-control' name='precio' />
                    </div>
                    <div class='form-group mb-4'>
                        <label for='año'>Año:</label>
                        <input id="año" type='number' value="{{ $videojuego->año}}" class='form-control' name='año' />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    
    @endisset
@endsection