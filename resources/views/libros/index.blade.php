<table border="1">
	<tr>
		<th>Titulo</th>
		<th>Editorial</th>
		<th>Autor</th>
		<th>Genero</th>
		<th>Precio</th>
    </tr>

    @foreach ($libros_list as $libros)

   	<tr>
		<td>{{ $libro->titulo }}</td>
		<td>{{ $libro->editorial }}</td>
		<td>{{ $libro->autor }}</td>
		<td>{{ $libro->genero }}</td>
		<td>{{ $libro->precio }}</td>
    </tr>

    @endforeach
</table>