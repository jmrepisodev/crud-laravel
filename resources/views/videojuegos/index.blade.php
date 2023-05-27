@extends('layouts.plantilla')

@section('content')

@include('videojuegos.layout.menu')

        <h1 class='display-3'>Inicio</h1>

       <p>Bienvenido a mi aplicación con Laravel</p>


        @if (session('success'))
            <div class='alert alert-success'>
                {{ session('success') }}
            </div>
        @endif

        @if (session('failure'))
            <div class='alert alert-danger'>
                {{ session('failure') }}
            </div>
        @endif

@endsection