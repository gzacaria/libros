@extends('menuPrincipal')
@section('content')

Stock {{$stock->libro_id}}
<br><br>

<form method="post" action="{{asset('stock/'.$stock->id)}}">
    {{ method_field ('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Eliminar">
</form>

@endsection