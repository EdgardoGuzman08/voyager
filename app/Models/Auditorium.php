<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Auditorium extends Model
{
    public function save(array $options = [])
    {

        $this->user = Auth::user()->getKey();



        return parent::save();
}
}
