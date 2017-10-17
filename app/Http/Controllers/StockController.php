<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Libro;

class StockController extends Controller
{
    public function index()
    {
    	$stock_list = Stock::all();
    	return view("stock.index", ["stock_list" => $stock_list]);   	
    }

    public function create()
    {
    	$libros_list=Libro::all();
        return view("stock.create",["libros_list"=>$libros_list]);
    }

    public function store(Request $request)
    {
    	// obtener datos enviados desde formulario
    	$libro_id = $request->input("cboLibro");
    	$cantidad_actual = $request->input("txtCantidadActual");
    	$cantidad_minima = $request->input("txtCantidadMinima");
    	
    	$stock = new Stock();
    	$stock->libro_id = $libro_id;
    	$stock->cantidad_actual = $cantidad_actual;
    	$stock->cantidad_minima = $cantidad_minima;
    	$stock->save();

        $mensaje="Stock agregado correctamente.";
        return redirect("stock/create")->with("mensaje",$mensaje);
    }
    public function show($id)
    {
        $stock=Stock::find($id); //encontrar un stock que coincida con esa id
        return view("stock.show",["stock"=>$stock]);
    }
    public function destroy($id)
    {
        $stock=Stock::find($id);
        $stock->delete();
        $mensaje="Stock eliminado correctamente.";
        return redirect("stock")->with("mensaje",$mensaje);
    }
    public function edit($id)
    {
        $stock=Stock::find($id);
        $libros_list=Libro::all();
        return view("stock.edit",["stock"=>$stock],["libros_list"=>$libros_list]);
    }
    public function update(Request $request,$id)
    {
        //obtener datos del formulario
        $libro_id = $request->input("cboLibro");
    	$cantidad_actual = $request->input("txtCantidadActual");
    	$cantidad_minima = $request->input("txtCantidadMinima");

        //obtener el stock a modificar
        $stock=Stock::find($id);

        //asignar datos al cliente
        $stock->libro_id = $libro_id;
    	$stock->cantidad_actual = $cantidad_actual;
    	$stock->cantidad_minima = $cantidad_minima;
    	$stock->save();
        
        $mensaje="Stock modificado correctamente";
        return redirect("stock/".$id."/edit")->with("mensaje",$mensaje);
    }
}