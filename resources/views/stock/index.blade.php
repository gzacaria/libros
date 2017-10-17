@extends('menuPrincipal')
@section('content')

<h1 align="center">Stock</h1>
<br>
<table border="1">
	<tr>
		<th>Libro</th>
		<th>Cantidad Actual</th>
		<th>Cantidad Minima</th>
		<th></th>
		<th></th>
    </tr>

    @foreach ($stock_list as $stock)

   	<tr>
		<td>{{ $stock->libro_id }}</td>
		<td>{{ $stock->cantidad_actual }}</td>
		<td>{{ $stock->cantidad_minima }}</td>
		<td><a href="stock/{{$stock->id}}/edit">Modificar</a></td>
		<td><a href="stock/{{$stock->id}}">Eliminar</a></td>
    </tr>

    @endforeach
</table>
<br>
<div align="center"><a href="stock/create">Nuevo Stock</a></div>
<br><br>
<div align="center">{{session("mensaje")}}</div>
@endsection