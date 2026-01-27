<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\FacturaLinea;
use Illuminate\Http\Request;

class LineaFacturaController extends Controller

{
    public function index($id_factura)
    {
        $factura = Facturas::findOrFail($id_factura);
        $lineas = $factura->lineas;

        return view('lineas.index', compact('factura', 'lineas'));
    }

    public function create($id_factura)
    {
        $factura = Facturas::findOrFail($id_factura);
        return view('lineas.create', compact('factura'));
    }

    public function store(Request $request, $id_factura)
    {
        $request->validate([
            'codigo' => 'required|integer',
            'cantidad' => 'required|numeric',
            'descripcion' => 'required|string|max:50',
            'precio' => 'required|numeric',
            'iva' => 'required|numeric',
        ]);

        $base = $request->cantidad * $request->precio;
        $importeiva = $base * $request->iva / 100;
        $importe = $base + $importeiva;

        FacturaLinea::create([
            'id_factura' => $id_factura,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'base' => $base,
            'iva' => $request->iva,
            'importeiva' => $importeiva,
            'importe' => $importe
        ]);


        return redirect()->route('lineas.index', $id_factura)
            ->with('mensaje', 'Línea creada correctamente.');
    }

    public function edit($id_factura, $id)
    {
        $factura = Facturas::findOrFail($id_factura);
        $linea = FacturaLinea::findOrFail($id);
        return view('lineas.edit', compact('linea', 'factura'));
    }

    public function update(Request $request, $id_factura, $id )
    {
        $request->validate([
            'codigo' => 'required|integer',
            'descripcion' => 'required|string|max:50',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'iva' => 'required|numeric',
        ]);

        $linea = FacturaLinea::findOrFail($id);

        $base = $request->cantidad * $request->precio;
        $importeiva = $base * $request->iva / 100;
        $importe = $base + $importeiva;

        $linea->update([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'base' => $base,
            'iva' => $request->iva,
            'importeiva' => $importeiva,
            'importe' => $importe
        ]);

        return redirect()->route('lineas.index', $id_factura)
            ->with('mensaje', 'Línea actualizada correctamente.');
    }

    public function destroy($id_factura, $id)
    {
        $linea = FacturaLinea::findOrFail($id);
        $linea->delete();

        return redirect()->route('lineas.index', $id_factura)
            ->with('mensaje', 'Línea borrada correctamente.');
    }
}
