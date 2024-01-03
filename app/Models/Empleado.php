<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public function getFullNameAttribute()
    {
        return "{$this->codigo} {$this->nombre}";
    }
    public $additional_attributes = ['full_name'];
}
