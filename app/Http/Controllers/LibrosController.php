<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Proveedor;

class LibrosController extends Controller
{
    public function index()
    {
    	$libros_list = Libro::all();
    	return view("libros.index", ["libros_list" => $libros_list]);   	
    }

    public function create()
    {
    	$proveedores_list=Proveedor::all();
        return view("libros.create",["proveedores_list"=>$proveedores_list]);
    }

    public function store(Request $request)
    {
    	// obtener datos enviados desde formulario
    	$titulo = $request->input("txtTitulo");
    	$editorial = $request->input("txtEditorial");
    	$autor = $request->input("txtAutor");
    	$fechaEdicion = $request->input("txtFechaEdicion");
    	$tipoTapa = $request->input("txtTipoTapa");
    	$genero = $request->input("txtGenero");
    	$precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");

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

        $mensaje="Libro agregado correctamente.";
        return redirect("libros/create")->with("mensaje",$mensaje);
    }
    public function show($id)
    {
        $libro=Libro::find($id); //encontrar un libro que coincida con esa id
        return view("libros.show",["libro"=>$libro]);
    }
    public function destroy($id)
    {
        $libro=Libro::find($id);
        $libro->delete();
        $mensaje="Libro eliminado correctamente.";
        return redirect("libros")->with("mensaje",$mensaje);
    }
    public function edit($id)
    {
        $libro=Libro::find($id);
        $proveedores_list=Proveedor::all();
        return view("libros.edit",["libro"=>$libro],["proveedores_list"=>$proveedores_list]);
    }
    public function update(Request $request,$id)
    {
        //obtener datos del formulario
        $titulo = $request->input("txtTitulo");
        $editorial = $request->input("txtEditorial");
        $autor = $request->input("txtAutor");
        $fechaEdicion = $request->input("txtFechaEdicion");
        $tipoTapa = $request->input("txtTipoTapa");
        $genero = $request->input("txtGenero");
        $precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");

        //obtener el cliente a modificar
        $libro=Libro::find($id);

        //asignar datos al cliente
        $libro->titulo = $titulo;
        $libro->editorial = $editorial;
        $libro->autor = $autor;
        $libro->fecha_edicion = $fechaEdicion;
        $libro->tipo_tapa = $tipoTapa;
        $libro->genero = $genero;
        $libro->precio = $precio;
        $libro->proveedor_id = $proveedor;
        $libro->save();
        
        $mensaje="Libro modificado correctamente";
        return redirect("libros/".$id."/edit")->with("mensaje",$mensaje);
    }
}