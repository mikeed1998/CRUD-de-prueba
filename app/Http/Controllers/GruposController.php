<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Estudiante;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::orderBy('created_at')->get();
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupos = Grupo::all();

        $this->validate($request, [
            'semestre' => 'required',
            'grupo' => 'required',
            'turno' => 'required'
        ]);
        
        $grupo_nuevo = new Grupo;

        $grupo_nuevo->semestre = $request->semestre;
        $grupo_nuevo->grupo = $request->grupo;
        $grupo_nuevo->turno = $request->turno;

        $grupo_nuevo->save();

        return redirect()->route('grupos', compact('grupos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grup = Grupo::find($id);
        return view('grupo', compact('grup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grup = Grupo::find($id);
        return view('grupos.edit', compact('grup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupos = Grupo::all();

        $this->validate($request, [
            'semestre' => 'required',
            'grupo' => 'required',
            'turno' => 'required'
        ]);
        
        $grupo_update = Grupo::find($id);

        $grupo_update->semestre = $request->semestre;
        $grupo_update->grupo = $request->grupo;
        $grupo_update->turno = $request->turno;

        $grupo_update->update();

        return redirect()->route('grupos', compact('grupos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiantes_hijos = Estudiante::all();

        $grupo_delete = Grupo::find($id);

        foreach($estudiantes_hijos as $eh) {
            if($eh->grupo == $id) {
                $eh->delete();
            }
        }

        $grupo_delete->delete();

        return redirect()->back();
    }
}
