<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacione; // Asegúrate de importar el modelo correcto

class ReparacioneController extends Controller
{
    public function calcularFaltante()
    {
        $reparaciones = Reparacione::find(1); // Reemplaza con el método que obtiene tu modelo
        $faltantes = $reparaciones->calcularFaltante();
        
        // Haz algo con $faltante, por ejemplo, devuélvelo en una vista o en una respuesta JSON
        return response()->json(['faltantes' => $faltantes]);
    }
}