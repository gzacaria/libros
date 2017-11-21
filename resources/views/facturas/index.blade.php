@extends('menuPrincipal')
@section('content')

<h1 align="center">Registro de Facturas</h1>
<br>
<table border="1">
	<tr>
		<th>Nº de Factura</th>
		<th>Fecha</th>
		<th>Tipo</th>
		<th>Cliente</th>
		<th>Total</th>
		<th></th>
    </tr>

    @foreach ($facturas_list as $factura)

   	<tr>
		<td>{{ $factura->numero }}</td>
		<td>{{ $factura->fecha }}</td>
		<td>{{ $factura->tipo }}</td>
		<td>{{ $factura->cliente->persona->apellido }}, {{ $factura->cliente->persona->nombre }}</td>
		<td>${{ $factura->total }}</td>
		<td><a href="facturas/{{$factura->id}}/detalle/add">Detalle</a></td>
	</tr>

    @endforeach
</table>
<br>
<div><a href="facturas/create">Nueva Factura</a></div>
<br><br>
<div>{{session("mensaje")}}</div>
@endsection