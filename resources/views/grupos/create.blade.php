@extends('front.layout')

@section('titulo', 'Nuevo Grupo')

@section('contenido')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Nuevo grupo</h1>
            <div class="col">
                <form action="{{ route('grupo_post') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="semestre" class="form-label">Semestre</label>
                            <select name="semestre" id="semestre" class="form-control" required> 
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="mayor">mayor</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="grupo" class="form-label">Grupo</label>
                            <select name="grupo" id="grupo" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="turno" class="form-label">Turno</label>
                            <select name="turno" id="turno" class="form-control" required>
                                <option value="matutino">Matutino</option>
                                <option value="vespertino">Vespertino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6 mx-auto py-3">
                            <input type="submit" class="btn btn-outline border border-dark w-100" value="Agregar nuevo Grupo">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection