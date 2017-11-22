<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Proveedor;
use App\Models\Stock;

class LibrosController extends Controller
{
    public function index()
    {
    	$libros_list = Libro::all();
        $stock_list = Stock::all();
    	return view("libros.index", ["libros_list" => $libros_list,"stock_list" => $stock_list]);   	
    }

    public function create()
    {
    	$proveedores_list=Proveedor::all();
        return view("libros.create",["proveedores_list"=>$proveedores_list]);
    }

    public function store(Request $request)
    {
    	$titulo = $request->input("txtTitulo");
    	$editorial = $request->input("txtEditorial");
    	$autor = $request->input("txtAutor");
    	$fechaEdicion = $request->input("txtFechaEdicion");
    	$tipoTapa = $request->input("txtTipoTapa");
    	$genero = $request->input("txtGenero");
    	$precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");
        $cantidad_actual = $request->input("txtCantidadActual");
        $cantidad_minima = $request->input("txtCantidadMinima");

    	$libro = new Libro();
    	$libro->titulo = $titulo;
    	$libro->editorial = $editorial;
    	$libro->autor = $autor;
    	$libro->fecha_edicion = $fechaEdicion;
    	$libro->tipo_tapa = $tipoTapa;
    	$libro->genero = $genero;
    	$libro->precio = $precio;
        $libro->proveedor_id = $proveedor;
    	$libro->save();

        $stock = new Stock();
        $stock->libro_id = $libro->id;
        $stock->cantidad_actual = $cantidad_actual;
        $stock->cantidad_minima = $cantidad_minima;
        $stock->save();

        $mensaje="Libro agregado correctamente.";
        return redirect("libros/create")->with("mensaje",$mensaje);
    }
    public function show($id)
    {
        $libro=Libro::find($id);
        return view("libros.show",["libro"=>$libro]);
    }
    public function destroy($id)
    {
        $stock=Stock::find($id);
        $stock->delete();
        $libro=Libro::find($id);
        $libro->delete();

        $mensaje="Libro eliminado correctamente.";
        return redirect("libros")->with("mensaje",$mensaje);
    }
    public function edit($id)
    {
        $libro=Libro::find($id);
        $stock=Stock::find($id);
        $proveedores_list=Proveedor::all();
        return view("libros.edit",["libro"=>$libro,"stock"=>$stock],["proveedores_list"=>$proveedores_list]);
    }
    public function update(Request $request,$id)
    {
        $titulo = $request->input("txtTitulo");
        $editorial = $request->input("txtEditorial");
        $autor = $request->input("txtAutor");
        $fechaEdicion = $request->input("txtFechaEdicion");
        $tipoTapa = $request->input("txtTipoTapa");
        $genero = $request->input("txtGenero");
        $precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");
        $cantidad_actual = $request->input("txtCantidadActual");
        $cantidad_minima = $request->input("txtCantidadMinima");

        $libro=Libro::find($id);
        $stock=Stock::find($id);

        if ($cantidad_actual < $cantidad_minima)
        {
            $mensaje = "Cantidad Actual debe ser mayor o igual a Cantidad Minima";
            return redirect("stock/".$id."/edit")->with("mensaje",$mensaje);
        }

        $libro->titulo = $titulo;
        $libro->editorial = $editorial;
        $libro->autor = $autor;
        $libro->fecha_edicion = $fechaEdicion;
        $libro->tipo_tapa = $tipoTapa;
        $libro->genero = $genero;
        $libro->precio = $precio;
        $libro->proveedor_id = $proveedor;
        $libro->save();

        $stock->libro_id = $libro->id;
        $stock->cantidad_actual = $cantidad_actual;
        $stock->cantidad_minima = $cantidad_minima;
        $stock->save();
        
        $mensaje="Libro modificado correctamente";
        return redirect("libros/".$id."/edit")->with("mensaje",$mensaje);
    }
}