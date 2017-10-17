@extends('menuPrincipal')
@section('content')

Contacto {{$contacto->persona->nombre}}, {{$contacto->persona->apellido}}
<br><br>

<form method="post" action="{{asset('contactos/'.$contacto->id)}}">
    {{ method_field ('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Eliminar">
</form>

@endsection