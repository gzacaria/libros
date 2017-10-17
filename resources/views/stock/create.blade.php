@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Nuevo Stock</h1>

<form method="POST" action="{{ asset('stock') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Libro: <select name="cboLibro">
@foreach ($libros_list as $libro)
<option value="{{$libro->id}}">{{$libro->titulo}}</option>
@endforeach
</select><br>
Cantidad Actual: <input type="text" name="txtCantidadActual"><br>
Cantidad Minima: <input type="text" name="txtCantidadMinima"><br>
<input type="submit" value="Guardar datos">
</form>

<a href="/libros/public/stock">Listado</a>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection