@extends('menuPrincipal')
@section('content')

<h1 align="center">Edicion de Cliente</h1>

<form method="POST" action="{{ asset('clientes/'.$cliente->id) }}">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Nombre: <input type="text" value="{{$cliente->persona->nombre}}" name="txtNombre"><br>
	Apellido: <input type="text" value="{{$cliente->persona->apellido}}" name="txtApellido"><br>
	DNI: <input type="text" value="{{$cliente->persona->dni}}" name="txtDNI"><br>
	Fecha de Nacimiento: <input type="date" value="{{$cliente->persona->fecha_nacimiento}}" name="txtFechaNacimiento"><br>
	Domicilio: <input type="text" value="{{$cliente->persona->domicilio}}" name="txtDomicilio"><br>
	<input type="submit" value="Guardar datos">
</form>
<a href="/libros/public/clientes">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection