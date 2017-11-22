@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Proveedores</h1>
<br>
<table border="1">
	<tr>
		<th>Razon Social</th>
		<th>Domicilio</th>
		<th>Email</th>
		<th>Nro. de Celular</th>
		<th>Nro. de Telefono</th>
		<th></th>
		<th></th>
    </tr>

    @foreach ($proveedores_list as $proveedor)

   		<tr>
			<td>{{ $proveedor->razon_social }}</td>
			<td>{{ $proveedor->domicilio }}</td>
			<td>{{ $proveedor->email }}</td>
			<td>{{ $proveedor->celular }}</td>
			<td>{{ $proveedor->telefono_fijo }}</td>
			<td><a href="proveedores/{{$proveedor->id}}/edit">Modificar</a></td>
			<td><a href="proveedores/{{$proveedor->id}}">Eliminar</a></td>
    	</tr>

    @endforeach
</table>
<br>
<div><a href="proveedores/create">Nuevo Proveedor</a></div>
<br><br>
<div>{{session("mensaje")}}</div>
@endsection