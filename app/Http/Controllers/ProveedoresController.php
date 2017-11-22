<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Libro;

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
    	$razonSocial = $request->input("txtRazonSocial");
    	$domicilio = $request->input("txtDomicilio");
    	$email = $request->input("txtEmail");
    	$celular = $request->input("txtNumeroCelular");
    	$telefono = $request->input("txtNumeroTelefono");
    	
    	$proveedor = new Proveedor();
    	$proveedor->razon_social = $razonSocial;
    	$proveedor->domicilio = $domicilio;
    	$proveedor->email = $email;
    	$proveedor->celular = $celular;
    	$proveedor->telefono_fijo = $telefono;
    	$proveedor->save();

        $mensaje="Proveedor creado correctamente.";
        return redirect("proveedores/create")->with("mensaje",$mensaje);
    }
    public function show($id)
    {
        $proveedor=Proveedor::find($id);
        return view("proveedores.show",["proveedor"=>$proveedor]);
    }
    public function destroy($id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->delete();
        $mensaje="Proveedor eliminado correctamente.";
        return redirect("proveedores")->with("mensaje",$mensaje);
    }
    
    public function edit($id)
    {
        $proveedor=Proveedor::find($id);
        return view("proveedores.edit",["proveedor"=>$proveedor]);
    }
    public function update(Request $request,$id)
    {
        $razonSocial = $request->input("txtRazonSocial");
        $domicilio = $request->input("txtDomicilio");
        $email = $request->input("txtEmail");
        $celular = $request->input("txtNumeroCelular");
        $telefono = $request->input("txtNumeroTelefono");

        $proveedor=Proveedor::find($id);

        $proveedor->razon_social = $razonSocial;
        $proveedor->domicilio = $domicilio;
        $proveedor->email = $email;
        $proveedor->celular = $celular;
        $proveedor->telefono_fijo = $telefono;
        $proveedor->save();
        
        $mensaje="Proveedor modificado correctamente";
        return redirect("proveedores/".$id."/edit")->with("mensaje",$mensaje);
    }
}