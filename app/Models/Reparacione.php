<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class Reparacione extends Model
{

    use HasFactory;
    protected $table = 'reparaciones';  //referencia a la tabla en el data base

    // Método para calcular el valor faltante
    public function calcularFaltante()
    {
        $entregadas = is_numeric($this->entregadas) ? $this->entregadas : 0;
        $revisadas = is_numeric($this->revisadas) ? $this->revisadas : 0;
        // Calcula el valor faltante
        $faltantes = $entregadas - $revisadas;
        return $faltantes;
    }

    // Método para calcular y guardar la fecha
    protected function calcularYGuardarFecha()
    {
        // Verificamos si created_at está presente
        if ($this->created_at) {
            // Extraemos la parte de la fecha y la guardamos en el campo fecha
            $fechas = Carbon::parse($this->created_at)->toDateString();
            $this->fecha = $fechas;
        }
    }

    // Método para calcular y guardar la semana
    protected function calcularYGuardarSemana()
    {
        // Verificamos si created_at está presente
        if ($this->created_at && !$this->semanas) {
            // Calculamos y guardamos la semana en el campo semanas
            $semana = Carbon::parse($this->created_at)->weekOfYear;
            $this->semanas = $semana;
        }
    }

    // Método boot que une las secciones saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Actualiza 'total_devoluciones' con el valor de 'revisadas'
            $model->total_devoluciones = $model->revisadas;

            // Calcula y actualiza 'faltantes'
            $model->faltantes = $model->calcularFaltante();

            // Calcula y guarda la fecha y semana
            $model->calcularYGuardarFecha();
            $model->calcularYGuardarSemana();
        });
    }
}
