@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Clientes</h1>
<br>
<table border="1" align="center">
	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>Activo</th>
		<th></th>
		<th></th>
    </tr>

    @foreach ($clientes_list as $cliente)

   	<tr>
		<td>{{ $cliente->persona->nombre }}</td>
		<td>{{ $cliente->persona->apellido }}</td>
		<td>{{ $cliente->persona->dni }}</td>
		<td>{{ $cliente->activo }}</td>
		<td><a href="clientes/{{$cliente->id}}/edit">Modificar</a></td>
		<td><a href="clientes/{{$cliente->id}}">Eliminar</a></td>
    </tr>
    @endforeach
</table>
<br>
<div align="center"><a href="clientes/create">Nuevo Cliente</a></div>
<br><br>
<div align="center">{{session("mensaje")}}</div>
@endsection