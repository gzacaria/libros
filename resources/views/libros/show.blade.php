@extends('menuPrincipal')
@section('content')

Libro {{$libro->titulo}}, {{$libro->autor}}
<br><br>

<form method="post" action="{{asset('libros/'.$libro->id)}}">
    {{ method_field ('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Eliminar">
</form>

@endsection