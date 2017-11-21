<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Libro;
use App\Models\DetalleFactura;
use App\Models\Stock;

class FacturaController extends Controller
{
    public function index()
    {
    	$facturas_list=Factura::all();
    	foreach ($facturas_list as $factura)
    	{
    		$factura->total=$factura->obtenerTotal();
    	}
    	return view('facturas.index',["facturas_list"=>$facturas_list]);
    }
    public function create()
    {
    	$clientes_list=Cliente::all();
    	return view('facturas.create',['clientes_list'=>$clientes_list]);
    }
    public function store(Request $request)
    {
    	$fecha = $request->input("txtFecha");
    	$cliente_id = $request->input("cboCliente");
    	$tipo = $request->input("cboTipo");
    	$numero = $request->input("txtNumero");
    	
    	$factura = new Factura();
    	$factura->fecha = $fecha;
    	$factura->cliente_id = $cliente_id;
    	$factura->tipo = $tipo;
    	$factura->numero = $numero;
    	$factura->save();

        $mensaje="Factura creada correctamente.";
        return redirect("/facturas/". $factura->id . "/detalle/add")->with("mensaje",$mensaje);
    }
    public function detalleadd($id)
    {
    	$factura=Factura::find($id);
    	$factura->total=$factura->obtenerTotal();
    	$libros_list=Libro::all();
    	$detalle_list=DetalleFactura::where('factura_id',$id)->get();

    	foreach ($detalle_list as $detalle)
    	{
    		$detalle->subtotal=$detalle->obtenerSubTotal();
    	}
    	return view ('facturas.detalleAdd',
    				['factura'=>$factura,'libros_list'=>$libros_list,'detalle_list'=>$detalle_list]);
    }
    public function detalleaddstore(Request $request, $factura_id)
    {
    	$libro_id=$request->input("cboLibro");
    	$cantidad=$request->input("txtCantidad");

    	$stock=Stock::where('libro_id',$libro_id)->first();
    	if ($cantidad>$stock->cantidad_actual)
    	{
    		$mensaje="No cuenta con la cantidad necesaria";
    		return redirect("/facturas/". $factura_id . "/detalle/add")->with("mensaje",$mensaje);
    	}
    	$stock->cantidad_actual=$stock->cantidad_actual-$cantidad;
    	$stock->save();

    	$libro=Libro::find($libro_id);
    	
    	$detalle = new DetalleFactura();
    	$detalle->factura_id=$factura_id;
    	$detalle->libro_id=$libro_id;
    	$detalle->cantidad=$cantidad;
    	$detalle->precio=$libro->precio;
    	$detalle->save();

    	$mensaje="Libro agregado correctamente";
    	return redirect("/facturas/". $factura_id . "/detalle/add")->with("mensaje",$mensaje);
    }
    public function detalledelete($id)
    {
    	$detalle=DetalleFactura::find($id);
    	$factura_id=$detalle->factura_id;
    	$libro_id=$detalle->libro_id;
    	$cantidad=$detalle->cantidad;

    	$stock=Stock::where('libro_id',$libro_id)->first();
    	$stock->cantidad_actual=$stock->cantidad_actual+$cantidad;
    	$stock->save();
    	
    	$detalle->delete();

    	$mensaje="Item eliminado correctamente";
    	return redirect("/facturas/". $factura_id . "/detalle/add")->with("mensaje",$mensaje);
    }
}
