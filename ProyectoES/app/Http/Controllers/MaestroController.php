<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestros;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maestros = Maestros::all();

        return response()->json([$maestros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
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
            'fecha_nacimiento' => 'nullable|date'
        ]);

        $maestro = new Maestros();
        $maestro->nombre = $request->input('nombre');
        $maestro->apellido = $request->input('apellido');
        $maestro->edad = $request->input('edad');
        $maestro->fecha_nacimiento = $request->input('fecha_nacimiento');

        $maestro->save();
        return response()->json(['message' => 'Maestro creado correctamente', 'Maestro' => $maestro]);
    }

    public function asignarClase(Request $request, $maestroId, $claseId)
{
    // Busca el maestro por su ID
    $maestro = Maestro::find($maestroId);

    // Verifica si el maestro existe
    if (!$maestro) {
        return response()->json(['message' => 'El maestro no fue encontrado.'], 404);
    }

    // Busca la clase por su ID
    $clase = Clase::find($claseId);

    // Verifica si la clase existe
    if (!$clase) {
        return response()->json(['message' => 'La clase no fue encontrada.'], 404);
    }

    // Asigna la clase al maestro a través de la tabla pivot maestro_clase
    $maestro->clases()->attach($clase);

    // Retorna una respuesta JSON
    return response()->json(['message' => 'Clase asignada al maestro correctamente']);
}

    /**
     * Display the specified resource.
     */
    public function show(string $nombre)
    {
        $maestro = Maestros::where('nombre','LIKE','%'.$nombre.'%')
        ->orWhere('apellido','LIKE','%'.$nombre.'%')->get();

        return response()->json([$maestro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(integer $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, integer $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'nullable|date'
        ]);

        $maestro = Maestros::find($id);

        if(!$maestro){
            return response()->json(['message' => 'Maestro no encontrado'], 404);
        }

        $maestro->nombre = $request->input('nombre');
        $maestro->apellido = $request->input('apellido');
        $maestro->edad = $request->input('edad');
        $maestro->fecha_nacimiento = $request->input('fecha_nacimiento');
        $maestro->save();

        return response()->json(['message' => 'Maestro actualizado correctamente',$estudiante]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(integer $id)
    {
        $maestro = Maestros::find($id);
        if (!$maestro) {
            return response()->json(['message' => 'Maestro no encontrado'], 404);
        }
        $maestro->delete();
        
        return response()->json(['message' => 'Maestro eliminado correctamente']);
    }
}
