<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofrendas;
use App\Models\Clases;

class OfrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ofrendas = Ofrendas::all();

        return response()->json([$ofrendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clase_id' => 'required|exists:clases,id',
            'monto' => 'required|numeric',
        ]);

        $ofrenda = new Ofrendas([
            'clase_id' => $request->input('clase_id'),
            'monto' => $request->input('monto'),
        ]);

        $ofrenda->save();

        return response()->json(['message' => 'Ofrenda registrada correctamente', 'ofrenda' => $ofrenda]);
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada
        $request->validate([
            'monto' => 'required|numeric',
        ]);
    
        // Busca la ofrenda por su ID
        $ofrenda = Ofrendas::find($ofrendaId);
    
        // Verifica si la ofrenda existe
        if (!$ofrenda) {
            return response()->json(['message' => 'La ofrenda no fue encontrada.'], 404);
        }
    
        // Actualiza los datos de la ofrenda
        $ofrenda->monto = $request->input('monto');
        $ofrenda->save();
    
        // Retorna una respuesta JSON
        return response()->json(['message' => 'Ofrenda actualizada correctamente', 'ofrenda' => $ofrenda]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ofrenda = Ofrendas::find($id);

        if(!$ofrenda) {
            return response()->json(['message' => 'Ofrenda no encontrada'], 404);
        }
        $ofrenda->delete();
        
        return response()->json(['message' => 'Ofrenda eliminada correctamente']);
    }
}
