@extends('layout')

@section('title', 'Página de jugadores')

@section('content')

    <h1>Plantilla Valencia CF</h1>

    <div class="player-container">
        @foreach($players as $player)
            @if($player->visibility || auth()->check())
                <div class="player">
                    @auth
                        <a href="{{ route('players.show', $player) }}">
                    @else
                        <a href="#">
                    @endauth
                        <img src="{{ $player->photo }}" alt="Foto del jugador" class="player-image">
                    </a>
                    <div class="player-details">
                        <p>Nombre: {{ $player->name }}</p>
                        <p>Posición: {{ $player->position }}</p>
                        <p>Dorsal: {{ $player->number }}</p>
                        @auth
                            @if(auth()->user()->isAdmin())
                                <form action="{{ route('players.updateVisibility', $player) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="visibility" value="{{ $player->visibility ? 0 : 1 }}">
                                    <button type="submit" class="btn btn-{{ $player->visibility ? 'primary' : 'danger' }} btn-xs">
                                        {{ $player->visibility ? 'Ahora mostrado' : 'Ahora oculto' }}
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
        @endforeach
    </div>



@endsection
