@extends ('menuPrincipal')
@section('content')
<br><br>

<h1 align="center">Añadir Detalles a Factura</h1>

<form method="POST" action="{{ asset('facturas/'.$factura->id.'/detalle/store') }}">
	<input type="hidden" name="_token" value=" {{ csrf_token() }} ">
<table border="1" width="500" cellspacing="10">
	<tr align="center">
		<td>Nº de Factura: {{ $factura->numero }}</td>
		<td>Fecha: {{ $factura->fecha }}</td>
	</tr>
	<tr align="center">
		<td>Tipo: {{$factura->tipo}}</td>
		<td>Cliente: {{$factura->cliente_id}}</td>
	</tr>
	<tr align="center">
		<td>Libro: 
			<select name="cboLibro">
				@foreach($libros_list as $libro)
				<option value="{{$libro->id}}">{{$libro->titulo}}</option>
				@endforeach
			</select>

		</td>
		<td>Cantidad: <input type="number" name="txtCantidad"></td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<input type="submit" value="Agregar Libro" name="enviar">
		</td>
	</tr>
</table>
</form>

<table border="1" width="500" cellspacing="10">
	<tr>
		<th>Código</th>
		<th>Libro</th>
		<th>Precio Unitario</th>
		<th>Cantidad</th>
		<th>Subtotal</th>
		<th>-</th>
	</tr>
	@foreach ($detalle_list as $detalle)
	<tr>
		<td>{{ $detalle->libro_id }}</td>
		<td>{{ $detalle->libro->titulo}}</td>
		<td>{{ $detalle->precio }}</td>
		<td>{{ $detalle->cantidad }}</td>
		<td> {{ $detalle->subtotal }}</td>
		<td> <a href="/libros/public/facturas/detalle/delete/{{$detalle->id}}">Eliminar</a></td>
	</tr>
	@endforeach
</table>
{{session("mensaje")}}
<br>
Total a pagar: ${{$factura->total}}
@endsection