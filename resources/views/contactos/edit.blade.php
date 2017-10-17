@extends('menuPrincipal')
@section('content')

<h1 align="center">Edicion de Contacto</h1>

<form method="POST" action="{{ asset('contactos/'.$contacto->id) }}">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Persona: <select name="cboPersona" value="{{$contacto->persona_id}}">
		@foreach ($personas_list as $personas)
		<option value="{{$personas->id}}">{{$personas->nombre}} {{ $personas->apellido }}</option>
	@endforeach
    </select><br>
    Email: <input type="text" name="txtEmail" value="{{$contacto->email}}"><br>
    Nº de Celular: <input type="text" name="txtCelular" value="{{$contacto->celular}}"><br>
    Nº de Telefono: <input type="text" name="txtTelefono" value="{{$contacto->telefono_fijo}}"><br>
    <input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/contactos">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection