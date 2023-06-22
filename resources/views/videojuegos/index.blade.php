@extends('layouts.plantilla')

@section('content')


        <h2>Inicio</h2>

       <p class="text-center">Catálogo de videojuegos</p>


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

        <div class="d-flex flex-nowrap">
            @if (count($videojuegos) > 0)
                @foreach($videojuegos as $videojuego)
                <div class="card m-3 p-3" style="width: 20rem;">
                    <img src="{{ asset('img/'.$videojuego->imagen)}}" class="card-img-top img-fluid" alt="imagen">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$videojuego->titulo}}</h5>
                        <ul>
                            <li class="card-text">{{$videojuego->desarrollador}}</li>
                            <li class="card-text">{{$videojuego->distribuidor}}</li>
                            <li class="card-text">{{$videojuego->genero}}</li>
                            <li class="card-text">{{$videojuego->año}}</li>
                        </ul>
                        
                        <a href="#" class="btn btn-success mb-3">Comprar</a>
                        @auth
                        @if(Auth::user()->role =='admin')
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('videojuegos.edit', $videojuego->id)}}" class='btn btn-primary'>Editar</a>
                            <form action="{{ route('videojuegos.destroy', $videojuego->id)}}" method='post'>
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-danger' type='submit'>Borrar</button>
                            </form>
                        </div>  
                        @endif  
                        @endauth
                    </div>
                </div>

                @endforeach
            @else
                <div class="alert alert-danger">
                    <p>No hay videojuegos en la base de datos</p>
                </div>
            @endif
        </div>
       

@endsection