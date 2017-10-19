@extends('menuPrincipal')
@section('content')

<h1 align="center">Edicion de Libros</h1>

<form method="POST" action="{{ asset('libros/'.$libro->id) }}">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Titulo: <input type="text" name="txtTitulo" value="{{$libro->titulo}}"><br>
	Editorial: <input type="text" name="txtEditorial" value="{{$libro->editorial}}"><br>
	Autor: <input type="text" name="txtAutor" value="{{$libro->autor}}"><br>
	Fecha de Edicion: <input type="date" name="txtFechaEdicion" value="{{$libro->fecha_edicion}}"><br>
	Tipo de Tapa: <select name="txtTipoTapa" value="{{$libro->tipo_tapa}}">
		<option value="">Seleccione un tipo de tapa</option>
		<option value="Blanda">Blanda</option>
		<option value="Dura">Dura</option>
	</select><br>
	Genero: <input type="text" name="txtGenero" value="{{$libro->genero}}"><br>
	Precio: <input type="text" name="txtPrecio" value="{{$libro->precio}}"><br>
	Proveedor: <select name="cboProveedor">
		@foreach ($proveedores_list as $proveedor)
		<option value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
		@endforeach
	</select><br>
	Cantidad Actual: <input type="text" name="txtCantidadActual" value="{{$stock->cantidad_actual}}"><br>
	Cantidad Minima: <input type="text" name="txtCantidadMinima" value="{{$stock->cantidad_minima}}"><br>
	<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/libros">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection