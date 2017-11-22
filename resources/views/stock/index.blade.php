@extends('menuPrincipal')
@section('content')

<h1 align="center">Stock</h1>
<br>
<table border="1">
	<tr>
		<th>Libro</th>
		<th>Cantidad Actual</th>
		<th>Cantidad Minima</th>
	</tr>

    @foreach ($stock_list as $stock)

		<tr>
			<td>{{ $stock->libro->titulo }}</td>
			<td>{{ $stock->cantidad_actual }}</td>
			<td>{{ $stock->cantidad_minima }}</td>
		</tr>

    @endforeach
</table>
<br>
<div align="center">{{session("mensaje")}}</div>
@endsection