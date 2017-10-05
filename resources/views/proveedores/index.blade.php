<table border="1">
	<tr>
		<th>Razon Social</th>
		<th>Domicilio</th>
		<th>Email</th>
		<th>Nro. de Celular</th>
		<th>Nro. de Telefono</th>
    </tr>

    @foreach ($libros_list as $libros)

   	<tr>
		<td>{{ $proveedor->razonSocial }}</td>
		<td>{{ $proveedor->domicilio }}</td>
		<td>{{ $proveedor->email }}</td>
		<td>{{ $proveedor->celular }}</td>
		<td>{{ $proveedor->telefono }}</td>
    </tr>

    @endforeach
</table>