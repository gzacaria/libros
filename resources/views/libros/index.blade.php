@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Libros</h1>
<br>
<table border="1">
	<tr>
		<th>Titulo</th>
		<th>Editorial</th>
		<th>Autor</th>
		<th>Genero</th>
		<th>Precio</th>
		<th>Cantidad Actual</th>
		<th>Cantidad Minima</th>
		<th></th>
		<th></th>
    </tr>

    @foreach ($libros_list as $libro)
		@foreach ($stock_list as $stock)

   			<tr>
				<td>{{ $libro->titulo }}</td>
				<td>{{ $libro->editorial }}</td>
				<td>{{ $libro->autor }}</td>
				<td>{{ $libro->genero }}</td>
				<td>{{ $libro->precio }}</td>
				<td>{{ $stock->cantidad_actual }}</td>
				<td>{{ $stock->cantidad_minima }}</td>
				<td><a href="libros/{{$libro->id}}/edit">Modificar</a></td>
				<td><a href="libros/{{$libro->id}}">Eliminar</a></td>
    		</tr>

    	@endforeach
    @endforeach
</table>
<br>
<div align="center"><a href="libros/create">Nuevo Libro</a></div>
<br><br>
<div align="center">{{session("mensaje")}}</div>
@endsection