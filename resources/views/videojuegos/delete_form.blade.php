@extends('layouts.plantilla')

@section('content')

@include('videojuegos.layout.menu')
    

  <h2>Eliminar</h2>

  <form method='post'
    action='{{ route("posts.delete.select.submit") }}'>
        @csrf
        <label>ID:</label>
        <input type='number' name='id' required='required' />
        <br /><br />
        <input type='submit' value='Enviar' />
    </form>

  @endsection