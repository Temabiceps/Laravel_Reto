<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //Test para Reto 3.3
    public function facturas() {
        return $this->hasMany('App\Models\facturas');
    }
}

// Comentario de practica RETO 3.3
