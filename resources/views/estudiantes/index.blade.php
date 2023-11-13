@extends('front.layout')

@section('titulo', 'Estudiantes')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col text-start">
            <a href="{{ route('index') }}" class="btn btn-outline btn-secondary">Volver al inicio</a>
        </div>
    </div>
    <div class="row">
        <div class="col-9 mx-auto">
            <h1 class="text-center">Estudiantes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Grupo</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estudiantes as $e) 
                        <tr>
                            <td>{{ $e->nombre }}</td>
                            <td>{{ $e->apellidos }}</td>
                            <td>{{ $e->edad }}</td>
                            <td>{{ $e->email }}</td>
                            <td>{{ $e->telefono }}</td>
                            <td>
                                @foreach ($grupos as $g)
                                    @if ($g->id == $e->grupo)
                                    {{ $g->semestre }} | {{ $g->grupo }} | {{ $g->turno }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-end">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('estudiante_edit', ['id' => $e->id]) }}" class="btn btn-outline border-dark bg-info">Editar</a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('estudiante_eliminar', ['id' => $e->id]) }}" method="POST">
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
            <a href="{{ route('estudiante_nuevo') }}" class="btn btn-outline btn-success">Crear nuevo estudiante</a>
        </div>
    </div>
</div>
@endsection