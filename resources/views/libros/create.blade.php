@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Nuevo Libro</h1>

<form method="POST" action="{{ asset('libros') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Titulo: <input type="text" name="txtTitulo"><br>
	Editorial: <input type="text" name="txtEditorial"><br>
	Autor: <input type="text" name="txtAutor"><br>
	Fecha de Edicion: <input type="date" name="txtFechaEdicion"><br>
	Tipo de Tapa: <select name="txtTipoTapa">
		<option value="">Seleccione un tipo de tapa</option>
		<option value="Blanda">Blanda</option>
		<option value="Dura">Dura</option>
	</select><br>
	Genero: <input type="text" name="txtGenero"><br>
	Precio: <input type="text" name="txtPrecio"><br>
	Proveedor: <select name="cboProveedor">
	@foreach ($proveedores_list as $proveedor)
		<option value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
	@endforeach
	</select><br>
	Cantidad Actual: <input type="text" name="txtCantidadActual"><br>
	Cantidad Minima: <input type="text" name="txtCantidadMinima"><br>
	<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/libros">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection