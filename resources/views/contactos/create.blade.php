@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Nuevo Contacto</h1>

<form method="POST" action="{{ asset('contactos') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Persona: <select name="cboPersona">
	@foreach ($personas_list as $personas)
		<option value="{{$personas->id}}">{{$personas->nombre}} {{ $personas->apellido }}</option>
	@endforeach
	</select><br>
	Email: <input type="text" name="txtEmail"><br>
	Nº de Celular: <input type="text" name="txtCelular"><br>
	Nº de Telefono: <input type="text" name="txtTelefono"><br>
	<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/contactos">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection