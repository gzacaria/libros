<form method="POST" action="{{ asset('libros') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Razon Social: <input type="text" name="txtRazonSocial"><br>
Domicilio: <input type="text" name="txtDomicilio"><br>
E-Mail: <input type="text" name="txtEmail"><br>
Nro. de Celular: <input type="date" name="txtNroCelular"><br>
Nro. de Telefono: <input type="text" name="txtNroTelefono"><br>
<input type="submit" value="Guardar datos">
</form>