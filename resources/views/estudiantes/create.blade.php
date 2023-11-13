@extends('front.layout')

@section('titulo', 'Nuevo Estudiante')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="text-center">Crear Estudiante</h1>
                <form action="{{ route('estudiante_post') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del estudiante" required>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos del estudiante" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" min="0" placeholder="Edad" required>
                        </div>
                        <div class="col-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            
                            <label for="grupo">Grupo escolar</label>
                            <select name="grupo" id="grupo" class="form-control" required>
                                @foreach($grupos as $gru)
                                    <option value="{{ $gru->id }}">
                                        {{ $gru->semestre }} | {{ $gru->grupo }} | {{ $gru->turno }}
                                    </option>
                                @endforeach
                            </select>
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6 mx-auto py-3">
                        <input type="submit" class="btn btn-outline border border-dark w-100" value="Agregar nuevo Estudiante">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection