<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;

class ProveedoresController extends Controller
{
    public function index()
    {
    	$proveedores_list = Proveedor::all();
    	return view("proveedores.index", ["proveedores_list" => $proveedores_list]);   	
    }

    public function create()
    {
    	return view("proveedores.create");
    }

    public function store(Request $request)
    {
    	// obtener datos enviados desde formulario
    	$razonSocial = $request->input("txtRazonSocial");
    	$domicilio = $request->input("txtDomicilio");
    	$email = $request->input("txtEmail");
    	$celular = $request->input("txtNroCelular");
    	$telefono = $request->input("txtNroTelefono");
    	
    	$proveedor = new Proveedor();
    	$proveedor->razonSocial = $razonSocial;
    	$proveedor->domicilio = $domicilio;
    	$proveedor->email = $email;
    	$proveedor->celular = $celular;
    	$proveedor->telefono = $telefono;
    	$proveedor->save();
    }
}