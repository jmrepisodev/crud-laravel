@extends('layouts.plantilla')

@section('content')

    @include('videojuegos.layout.menu')

        <h1 class='display-3'>Lista videojuegos</h1>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @if (count($videojuegos) > 0)
        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr class="align-middle text-md-center">
                <td>ID</td>
                <td>ISAN</td>
                <td>Título</td>
                <td>Dsarrollador</td>
                <td>Distribuidor</td>
                <td>Género</td>
                <td>Año</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
            </thead>
            <tbody> 
            @foreach($videojuegos as $videojuego)
            <tr>
                <td>{{$videojuego->id}}</td>
                <td>{{$videojuego->isan}}</td>
                <td>{{$videojuego->titulo}}</td>
                <td>{{$videojuego->desarrollador}}</td>
                <td>{{$videojuego->distribuidor}}</td>
                <td>{{$videojuego->genero}}</td>
                <td>{{$videojuego->año}}</td>
                <td><a href="{{ route('videojuegos.edit', $videojuego->id)}}" class='btn btn-primary'>Editar</a></td>
                <td>
                <form action="{{ route('videojuegos.destroy', $videojuego->id)}}" method='post'>
                    @csrf
                    @method('DELETE')
                    <button class='btn btn-danger' type='submit'>Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-danger">
                <p>No hay videojuegos en la base de datos</p>
            </div>
        @endif

@endsection