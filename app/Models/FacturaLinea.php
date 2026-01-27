<?php

namespace App\Models;

use App\Models\Facturas;
use Illuminate\Database\Eloquent\Model;

class FacturaLinea extends Model
{
    protected $table = 'facturalineas';

    protected $fillable = [
        'id_factura',
        'codigo',
        'cantidad',
        'descripcion',
        'precio',
        'iva'
    ];

    protected static function booted()
    {
        static::saving(function ($linea) {
            $linea->base = $linea->cantidad * $linea->precio;
            $linea->importeiva = $linea->base * ($linea->iva / 100);
            $linea->importe = $linea->base + $linea->importeiva;
        });
    }

    public function factura()
    {
        return $this->belongsTo(Facturas::class, 'id_factura');
    }
}
