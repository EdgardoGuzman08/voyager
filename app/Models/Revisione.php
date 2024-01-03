<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon as Carbon;
class Revisione extends Model
{
   
    public function save(array $options = [])
    {
    
            $this->user = Auth::user()->getKey();
        
    

        return parent::save();
    }

    // Cambiamos de creating y updating a saving
    protected static function boot()
    {
        parent::boot();

        // Utilizamos el evento saving
        static::saving(function ($revisione) {
            $revisione->calcularYGuardarFecha();
            $revisione->calcularYGuardarSemana();
        });

        static::created(function ($revisione) {
            $revisione->calcularYGuardarFecha();
            $revisione->calcularYGuardarSemana();
            $revisione->save(); // Guardar nuevamente para asegurar los cambios
        });

    }

    // Nuevo método para calcular y guardar la fecha
    protected function calcularYGuardarFecha()
    {
        // Verificamos si created_at está presente
        if ($this->created_at) {
            // Extraemos la parte de la fecha y la guardamos en el campo fecha
            $fechas = Carbon::parse($this->created_at)->toDateString();
            $this->fecha = $fechas;
        }
    }

    // Nuevo método para calcular y guardar la semana
    protected function calcularYGuardarSemana()
    {
        // Verificamos si created_at está presente
        if ($this->created_at && !$this->semanas) {
            // Calculamos y guardamos la semana en el campo semanas
            $semana = Carbon::parse($this->created_at)->weekOfYear;
            $this->semanas = $semana;
        }
    }
}
