<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencias;
use App\Models\Estudiantes;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén todas las asistencias con las relaciones de estudiante y clase
        $asistencias = Asistencia::with(['estudiante', 'clase'])->get();

        // Formatea los datos para mostrar el nombre del alumno y el nombre del curso
        $data = [];
        foreach ($asistencias as $asistencia) {
            $data[] = [
                'nombre_alumno' => $asistencia->estudiante->nombreCompleto(), // Supongo que tienes un método en el modelo Estudiante para obtener el nombre completo.
                'nombre_curso' => $asistencia->clase->nombre,
                'estado' => $asistencia->estado,
                'fecha_asistencia' => $asistencia->fecha_asistencia,
            ];
        }

        return response()->json(['asistencias' => $data]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
