<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;
use App\Models\Proveedores;

class LibrosController extends Controller
{
    public function index()
    {
    	$libros_list = Libro::all();
    	return view("libros.index", ["libros_list" => $libros_list]);   	
    }

    public function create()
    {
    	return view("libros.create");
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

    	$libro = new Libro();
    	$libro->titulo = $titulo;
    	$libro->editorial = $editorial;
    	$libro->autor = $autor;
    	$libro->fechaEdicion = $fechaEdicion;
    	$libro->tipoTapa = $tipoTapa;
    	$libro->genero = $genero;
    	$libro->precio = $precio;
    	$libro->save();
    }
}