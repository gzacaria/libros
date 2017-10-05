
<form method="POST" action="{{ asset('libros') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Titulo: <input type="text" name="txtTitulo"><br>
Editorial: <input type="text" name="txtEditorial"><br>
Autor: <input type="text" name="txtAutor"><br>
Fecha de Edicion: <input type="date" name="txtFechaEdicion"><br>
Tipo de Tapa: <input type="text" name="txtTipoTapa"><br>
Genero: <input type="text" name="txtGenero"><br>
Precio: <input type="text" name="txtPrecio"><br>
<input type="submit" value="Guardar datos">
</form>