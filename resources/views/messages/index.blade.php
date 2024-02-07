@extends('layout')

@section('title', 'Página de Mensajes')

@section('content')

<div class="container">
    <h1>Lista de Mensajes</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <ul class="list-group">
                @forelse ($messages as $message)
                <li class="list-group-item {{ $message->readed ? '' : 'list-group-item-info' }}">
                    <a href="{{ route('messages.show', $message->id) }}">
                        @if ($message->readed)
                        {{ $message->subject }}
                        @else
                        <strong>{{ $message->subject }}</strong>
                        @endif
                        - Enviado por: {{ $message->name }}
                    </a>
                </li>
                @empty
                <li class="list-group-item">No hay mensajes.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>



@endsection
