<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditoriaEmpaque extends Model
{
    use HasFactory;

    protected $table = "auditoria_empaque";

    protected $fillable = [
        // Otros campos...
        'info_label',
        'correct_lid',
        'correct_polybag',
        'QTY',
        'size_box',
        'barcodes',
        'finished',
        // Otros campos...
    ];

    // Constantes para valores permitidos
    const YES = 'Yes';
    const NO = 'No';

    // Opciones para el campo select
    public static function getSelectOptions()
    {
        return [
            self::YES => 'Yes',
            self::NO => 'No',
        ];
    }

    // Mutadores para campos con valores permitidos "Yes" o "No"
    public function setInfoLabelAttribute($value)
    {
        $this->attributes['info_label'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setCorrectLidAttribute($value)
    {
        $this->attributes['correct_lid'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setCorrectPolybagAttribute($value)
    {
        $this->attributes['correct_polybag'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setQTYAttribute($value)
    {
        $this->attributes['QTY'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setSizeBoxAttribute($value)
    {
        $this->attributes['size_box'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setBarcodesAttribute($value)
    {
        $this->attributes['barcodes'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function setFinishedAttribute($value)
    {
        $this->attributes['finished'] = ($value == self::YES) ? self::YES : self::NO;
    }

    public function save(array $options = [])
    {
        $this->user = Auth::user()->getKey();
        return parent::save();
    }
}
