@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Contactos</h1>
<br>
<table border="1" align="center">
	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Nº de Celular</th>
		<th>Nº de Telefono</th>
		<th></th>
		<th></th>
    </tr>

    @foreach ($contactos_list as $contacto)

   	<tr>
		<td>{{ $contacto->persona->nombre }}</td>
		<td>{{ $contacto->persona->apellido }}</td>
		<td>{{ $contacto->email }}</td>
		<td>{{ $contacto->celular }}</td>
		<td>{{ $contacto->telefono_fijo  }}</td>
		<td><a href="contactos/{{$contacto->id}}/edit">Modificar</a></td>
		<td><a href="contactos/{{$contacto->id}}">Eliminar</a></td>
    </tr>
    @endforeach
</table>
<br>
<div align="center"><a href="contactos/create">Nuevo Contacto</a></div>
<br><br>
<div align="center">{{session("mensaje")}}</div>
@endsection