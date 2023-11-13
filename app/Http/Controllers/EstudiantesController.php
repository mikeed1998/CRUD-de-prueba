<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grupo;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index() {
        $grupos = Grupo::all();
        $estudiantes = Estudiante::orderBy('created_at')->get();
        return view('estudiantes.index', compact('grupos', 'estudiantes'));
    }

    public function create() {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    public function store(Request $request) {
        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();

        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'grupo' => 'required'
        ]);

        $estudiante_nuevo = new Estudiante;

        $estudiante_nuevo->nombre = $request->nombre;
        $estudiante_nuevo->apellidos = $request->apellidos;
        $estudiante_nuevo->edad = $request->edad;
        $estudiante_nuevo->email = $request->email;
        $estudiante_nuevo->telefono = $request->telefono;
        $estudiante_nuevo->grupo = $request->grupo;

        $estudiante_nuevo->save();

        return redirect()->route('estudiantes', compact('grupos', 'estudiantes'));
    }

    public function show($id) {
        return view('front.show', compact('id'));
    }

    public function edit($id) {
        $grupos = Grupo::all();
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('grupos', 'estudiante'));
    }

    public function update(Request $request, $id) {
        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();

        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'grupo' => 'required'
        ]);

        $estudiante_update = Estudiante::find($id);

        $estudiante_update->nombre = $request->nombre;
        $estudiante_update->apellidos = $request->apellidos;
        $estudiante_update->edad = $request->edad;
        $estudiante_update->email = $request->email;
        $estudiante_update->telefono = $request->telefono;
        $estudiante_update->grupo = $request->grupo;

        $estudiante_update->update();

        return redirect()->route('estudiantes', compact('grupos', 'estudiantes'));       
    }

    public function destroy($id) {
        $estudiante_eliminar = Estudiante::find($id);
        $estudiante_eliminar->delete();
        return redirect()->back();
    }
}
