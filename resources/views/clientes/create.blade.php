@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Nuevo Cliente</h1>

<form method="POST" action="{{ asset('clientes') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Nombre: <input type="text" name="txtNombre"><br>
Apellido: <input type="text" name="txtApellido"><br>
DNI: <input type="text" name="txtDNI"><br>
Fecha de Nacimiento: <input type="date" name="txtFechaNacimiento"><br>
Domicilio: <input type="text" name="txtDomicilio"><br>
<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/clientes">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection