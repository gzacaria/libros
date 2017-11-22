<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Persona;

class ContactoController extends Controller
{
    public function index()
    {
    	$contactos_list = Contacto::all();
    	return view("contactos.index", ["contactos_list" => $contactos_list]);   	
    }

    public function create()
    {
    	$personas_list=Persona::all();
        return view("contactos.create",["personas_list"=>$personas_list]);
    }

    public function store(Request $request)
    {
    	$persona_id = $request->input("cboPersona");
    	$email = $request->input("txtEmail");
    	$celular = $request->input("txtCelular");
    	$telefono = $request->input("txtTelefono");
    	
    	$contactos = new Contacto();
    	$contactos->persona_id = $persona_id;
    	$contactos->email = $email;
    	$contactos->celular = $celular;
    	$contactos->telefono_fijo = $telefono;
    	$contactos->save();

        $mensaje="Contacto agregado correctamente.";
        return redirect("contactos/create")->with("mensaje",$mensaje);
    }

    public function show($id)
    {
        $contacto=Contacto::find($id);
        return view("contactos.show",["contacto"=>$contacto]);
    }
    public function destroy($id)
    {
        $contacto=Contacto::find($id);
        $contacto->delete();
        $mensaje="Contacto eliminado correctamente.";
        return redirect("contactos")->with("mensaje",$mensaje);
    }
    public function edit($id)
    {
        $contacto=Contacto::find($id);
        $personas_list=Persona::all();
        return view("contactos.edit",["contacto"=>$contacto],["personas_list"=>$personas_list]);
    }
    public function update(Request $request,$id)
    {
        $persona_id = $request->input("cboPersona");
    	$email = $request->input("txtEmail");
    	$celular = $request->input("txtCelular");
    	$telefono = $request->input("txtTelefono");

        $contacto=Contacto::find($id);

        $contacto->persona_id = $persona_id;
    	$contacto->email = $email;
    	$contacto->celular = $celular;
    	$contacto->telefono_fijo = $telefono;
    	$contacto->save();
        
        $mensaje="Contacto modificado correctamente";
        return redirect("contactos/".$id."/edit")->with("mensaje",$mensaje);
    }
}