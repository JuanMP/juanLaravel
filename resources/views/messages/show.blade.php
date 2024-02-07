@extends('layout')

@section('title', 'Página de mensaje concreto')

@section('content')

<h3>Mensaje de {{ $message->name }}</h3>
<h4><strong>Asunto: </strong>{{ $message->subject }}</h4>
<h4><strong>Mensaje:</strong> {{ $message->text }}</h4>

<form action="{{ route('messages.destroy', $message) }}" method="post">
@csrf
@method('delete')
<input type="submit" class="btn btn-danger" value="Eliminar">
</form>


@endsection
