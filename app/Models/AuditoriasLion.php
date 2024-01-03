<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditoriasLion extends Model
{
    use HasFactory;
    protected $table = "auditorias_lion";

    public function save(array $options = [])
    {

        $this->user = Auth::user()->getKey();



        return parent::save();
}
}
