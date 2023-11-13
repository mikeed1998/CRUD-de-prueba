@extends('front.layout')

@section('titulo', 'Grupos')

@section('contenido')
    
    <div class="container">
        <div class="row">
            <div class="col text-start">
                <a href="{{ route('index') }}" class="btn btn-outline btn-secondary">Volver al inicio</a>
            </div>
        </div>
        <div class="row">
            <div class="col-9 mx-auto">
                <h1 class="text-center">Grupos</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Semestre</td>
                            <td>Grupo</td>
                            <td>Turno</td>
                            <td class="text-end">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupos as $g) 
                            <tr>
                                <td>{{ $g->semestre }}</td>
                                <td>{{ $g->grupo }}</td>
                                <td>{{ $g->turno }}</td>
                                <td class="text-end">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('grupo_edit', ['id' => $g->id]) }}" class="btn btn-outline border-dark bg-info">Editar</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('grupo_eliminar', ['id' => $g->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline border-dark bg-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mx-auto">
                <a href="{{ route('grupo_nuevo') }}" class="btn btn-outline btn-success">Crear nuevo grupo</a>
            </div>
        </div>
    </div>
@endsection