@extends('menuPrincipal')
@section('content')

<h1 align="center">Edicion de Proveedor</h1>

<form method="POST" action="{{ asset('proveedores/'.$proveedor->id) }}">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Razon Social: <input type="text" name="txtRazonSocial" value="{{$proveedor->razon_social}}"><br>
	Domicilio: <input type="text" name="txtDomicilio" value="{{$proveedor->domicilio}}"><br>
	E-Mail: <input type="text" name="txtEmail" value="{{$proveedor->email}}"><br>
	Nro. de Celular: <input type="text" name="txtNumeroCelular" value="{{$proveedor->celular}}"><br>
	Nro. de Telefono: <input type="text" name="txtNumeroTelefono" value="{{$proveedor->telefono_fijo}}"><br>
	<input type="submit" value="Guardar datos">
</form>
<a href="/libros/public/proveedores">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection