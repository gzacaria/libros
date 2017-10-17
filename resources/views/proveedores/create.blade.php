@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Nuevo Proveedor</h1>

<form method="POST" action="{{ asset('proveedores') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Razon Social: <input type="text" name="txtRazonSocial"><br>
Domicilio: <input type="text" name="txtDomicilio"><br>
E-Mail: <input type="text" name="txtEmail"><br>
Nro. de Celular: <input type="text" name="txtNumeroCelular"><br>
Nro. de Telefono: <input type="text" name="txtNumeroTelefono"><br>
<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/proveedores">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection