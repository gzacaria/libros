<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleFactura;

class Factura extends Model
{
    protected $table="factura";
    public function cliente()
    {
    	return $this->belongsTo("App\Models\Cliente");
    }
    public function obtenerTotal()
    {
    	$detalle_list=DetalleFactura::where('factura_id',$this->id)->get();
    	$total=0;
    	foreach ($detalle_list as $detalle) {
    		$subtotal=$detalle->precio * $detalle->cantidad;
    		$total=$total+$subtotal;
    	}
    	return $total;
    }
}
