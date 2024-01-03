<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ReportesCorte extends Model
{
   
   
    public function save(array $options = [])
{
   
        $this->user = Auth::user()->getKey();
       
   

    return parent::save();
}
}

