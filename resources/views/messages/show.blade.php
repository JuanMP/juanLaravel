@extends('layout')

@section('title', 'Página de mensaje concreto')

@section('content')

<h3>Mensaje de {{ $message->name }}</h3>
<h3>Asunto: {{ $message->subject }}</h3>
<h3>Mensaje: {{ $message->text }}</h3>

<form action="{{ route('messages.destroy', $message) }}" method="post">
@csrf
@method('delete')
<input type="submit" value="Eliminar">
</form>


@endsection
