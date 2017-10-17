@extends('menuPrincipal')
@section('content')

<h1 align="center">Edicion de Stock</h1>

<form action="{{ asset('stock/'.$stock->id) }}" method="post">
	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Libro: <select name="cboLibro" value="{{$stock->libro_id}}">
		@foreach ($libros_list as $libro)
		<option value="{{$libro->id}}">{{$libro->titulo}}</option>
	@endforeach
    </select><br>
    Cantidad Actual: <input type="text" name="txtCantidadActual" value="{{$stock->cantidad_actual}}"><br>
    Cantidad Minima: <input type="text" name="txtCantidadMinima" value="{{$stock->cantidad_minima}}"><br>
    <input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/stock">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection