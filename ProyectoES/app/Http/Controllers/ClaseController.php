<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clases;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = Clases::all();

        return response()->json([$clases]);
    }

    public function viewClases(string $claseId)
    {
        $clase = Clases::find($claseId);

        if (!$clase) {
            return response()->json(['message' => 'La clase no fue encontrada.'], 404);
        }

        $clases = $clase->clases;

        return response()->json(['clases' => $clases]);
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
            'edad_entrada' => 'required|integer',
            'edad_salida' => 'nullable|integer'
        ]);

        $clase = new Clases();
        $clase -> nombre = $request->input('nombre');
        $clase -> edad_entrada = $request->input('edad_entrada');
        $clase -> edad_salida = $request->input('edad_salida');

        $clase -> save();
        return response()->json(['message' => 'Clase creado correctamente', 'Clase' => $clase]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'edad_entrada' => 'required|integer',
            'edad_salida' => 'nullable|integer'
        ]);

        $clase = Clases::find($id);

        if(!$clase){
            return response()->json(['message' => 'clase no encontrado'], 404);
        }

        $clase->nombre = $request->input('nombre');
        $clase->edad_entrada = $request->input('edad_entrada');
        $clase->edad_salida = $request->input('edad_salida');
        $clase->save();

        return response()->json(['message' => 'Clase actualizado correctamente',$clase]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clase = Clases::find($id);
        if (!$clase) {
            return response()->json(['message' => 'clase no encontrado'], 404);
        }
        $clase->delete();
        
        return response()->json(['message' => 'clase eliminada correctamente']);
    }
}
