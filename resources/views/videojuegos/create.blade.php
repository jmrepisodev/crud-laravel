@extends('layouts.plantilla')

@section('content')


<div class='row'>
  <div class='col-sm-8 offset-sm-2'>
    <h1 class='display-3'>Añadir un videojuego</h1>
    <div>
      @if ($errors->any())
      <div class='alert alert-danger'>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <br />
      @endif

      
      <form class="my-3" method='post' action="{{ route('videojuegos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class='form-group mb-3'>
          <label for='isan'>ISAN:</label>
          <input id="isan" type='text' class='form-control' name='isan' />
        </div>
        <div class='form-group mb-3'>
          <label for='titulo'>Título:</label>
          <input id="titulo" type='text' class='form-control' name='titulo' />
        </div>
        <div class='form-group mb-3'>
          <label for='desarrollador'>Desarrollador:</label>
          <input id="desarrollador" type='text' class='form-control' name='desarrollador' />
        </div>
        <div class='form-group mb-3'>
          <label for='distribuidor'>Distribuidor:</label>
          <input id="distribuidor" type='text' class='form-control' name='distribuidor' />
        </div>
        <div class='form-group mb-3'>
          <label for='genero'>Género:</label>
          <input id="genero" type='text' class='form-control' name='genero' />
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
          <input id="año" type='number' class='form-control' name='año' />
        </div>
        <button type='submit' class='btn btn-primary'>Añadir</button>
      </form>
    </div>
  </div>
</div>
@endsection