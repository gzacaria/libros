<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Contacto;

class ClienteController extends Controller
{
    public function index()
    {
    	$clientes_list = Cliente::all();
    	return view("clientes.index", ["clientes_list" => $clientes_list]);   	
    }

    public function create()
    {
    	return view("clientes.create");
    }

    public function store(Request $request)
    {
    	$nombre = $request->input("txtNombre");
    	$apellido = $request->input("txtApellido");
    	$dni = $request->input("txtDNI");
    	$fechaNacimiento = $request->input("txtFechaNacimiento");
    	$domicilio = $request->input("txtDomicilio");

    	$persona = new Persona();
    	$persona->nombre = $nombre;
    	$persona->apellido = $apellido;
    	$persona->dni = $dni;
    	$persona->fecha_nacimiento = $fechaNacimiento;
    	$persona->domicilio = $domicilio;
    	$persona->save();

    	$cliente = new Cliente();
    	$cliente->persona_id = $persona->id;
    	$cliente->save();

        $mensaje="Cliente creado correctamente.";
        return redirect("clientes/create")->with("mensaje",$mensaje);
    }
    public function show($id)
    {
        $cliente=Cliente::find($id);
        return view("clientes.show",["cliente"=>$cliente]);
    }
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $contacto=Contacto::find($id);
        $persona=$cliente->persona;
        if ($contacto<>0)
        {
        	$contacto->delete();
        }
        $cliente->delete();
        $persona->delete();
        $mensaje="Cliente eliminado correctamente.";
        return redirect("clientes")->with("mensaje",$mensaje);
    }
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view("clientes.edit",["cliente"=>$cliente]);
    }
    public function update(Request $request,$id)
    {
        $nombre = $request->input("txtNombre");
        $apellido = $request->input("txtApellido");
        $dni = $request->input("txtDNI");
        $fechaNacimiento = $request->input("txtFechaNacimiento");
        $domicilio = $request->input("txtDomicilio");

        $cliente=Cliente::find($id);

        $cliente->persona->nombre=$nombre;
        $cliente->persona->apellido=$apellido;
        $cliente->persona->dni=$dni;
        $cliente->persona->fecha_nacimiento=$fechaNacimiento;
        $cliente->persona->domicilio=$domicilio;
        $cliente->persona->save();

        $mensaje="Cliente modificado correctamente";
        return redirect("clientes/".$id."/edit")->with("mensaje",$mensaje);
    }
}