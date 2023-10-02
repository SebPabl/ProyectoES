<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiantes::All();

        return response()->json([$estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'edad' => 'required|integer',
        'fecha_nacimiento' => 'nullable|date',
        'direccion' => 'nullable|string|max:255',
        'clase_id' => 'required|integer',
    ]);

    $estudiante = new Estudiantes([
        'nombre' => $request->input('nombre'),
        'apellido' => $request->input('apellido'),
        'edad' => $request->input('edad'),
        'fecha_nacimiento' => $request->input('fecha_nacimiento'),
        'direccion' => $request->input('direccion'),
    ]);

    $estudiante->save();
    $estudiante->clases()->attach($request->input('clase_id'));

    return response()->json(['message' => 'Estudiante registrado y asignado a la clase correctamente', 'estudiante' => $estudiante]);
    }

    
    public function show(string $nombre)
    {
        $estudiante = Estudiantes::where('nombre','LIKE','%'.$nombre.'%')
        ->orWhere('apellido','LIKE','%'.$nombre.'%')->get();

        return response()->json([$estudiante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|max:255'
        ]);

        $estudiante = Estudiantes::find($id);

        if(!$estudiante){
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido = $request->input('apellido');
        $estudiante->edad = $request->input('edad');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->direccion = $request->input('direccion');
        $estudiante->save();

        return response()->json(['message' => 'Clase actualizado correctamente',$estudiante]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiantes::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        $estudiante->delete();
        
        return response()->json(['message' => 'Estudiante eliminado correctamente']);
    }
}
