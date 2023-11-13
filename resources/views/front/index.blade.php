@extends('front.layout')

@section('titulo', 'Principal')

@section('contenido')
    <div class="container py-5 border mt-5 mb-5">
        <div class="row">
            <div class="col text-center display-5">
                CRUD de práctica
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                Para crear estudiantes necesitan existir grupos, ya que cada estudiante debe estar asignado a un grupo y un grupo puede tener varios estudiantes (relacion uno a muchos).
            </div>
        </div>
        <div class="row">
            @if ($contador == 0)
                <div class="col-4 mx-auto py-5 text-center">
                    <a href="#/" class="btn btn-outline bg-danger w-100 text-white fs-5 fw-bold disabled">No puedes crear estudiantes porque no hay grupos</a>
                </div>
            @else
                <div class="col-4 mx-auto py-5 text-center">
                    <a href="{{ route('estudiantes') }}" class="btn btn-outline bg-success w-100 text-white fs-5 fw-bold">ESTUDIANTES</a>
                </div>
            @endif
            <div class="col-4 mx-auto py-5 text-center">
                <a href="{{ route('grupos') }}" class="btn btn-outline bg-success w-100 text-white fs-5 fw-bold">GRUPOS</a>
            </div>
        </div>
    </div>
@endsection