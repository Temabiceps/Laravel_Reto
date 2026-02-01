<?php

namespace App\Models;

use App\Models\FacturaLinea;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    protected $fillable = [
        'cliente_id',
        'numero',
        'fecha',
    ];

    // Devuelve la lista de facturas
    public function lineas()
    {
        return $this->hasMany(FacturaLinea::class, 'id_factura');
    }

}

// Comentario de practica RETO 3.3