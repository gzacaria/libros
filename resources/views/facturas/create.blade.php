@extends('menuPrincipal')
@section('content')

<h1 align="center">Nueva Factura</h1>

<form method="POST" action="{{ asset('facturas') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

Número: <input type="text" name="txtNumero"><br>
Fecha: <input type="date" name="txtFecha"><br>
Tipo:
<select name="cboTipo">
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
</select><br>

Cliente:
<select name="cboCliente">
	@foreach ($clientes_list as $cliente)
	<option value="{{$cliente->id}}">
		{{$cliente->persona->apellido}}, {{$cliente->persona->nombre}}
	</option>
	@endforeach
</select><br>
<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/facturas">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection