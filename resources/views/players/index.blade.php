@extends('layout')

@section('title', 'Página de jugadores')

@section('content')

    <h1>Plantilla Valencia CF</h1>

    <ul>
        @auth
        @foreach($players as $player)
        <li>
            <a href="{{ route('players.show', $player) }}">
            <img src="{{ $player->photo }}" class="player-image">
            </a>
            <br>
            Nombre: {{ $player->name }}
            <br>
            Posición: {{ $player->position }}
            <br>
            Dorsal: {{ $player->number }}
            <br>
            @if(auth()->user()->isAdmin())
            <form action="{{ route('players.updateVisibility', $player) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="visibility" value="{{ $player->visibility ? 0 : 1 }}">
                <button type="submit" class="btn btn-primary btn-xs">
                    {{ $player->visibility ? 'Ocultar' : 'Mostrar' }}
                </button>
            </form>
            @endif
        </li>
        @endforeach
        @endauth
    </ul>


@endsection
