@extends('layout')

@section('title', 'Detalles del Jugador')

@section('content')

    <div class="container">
        <h1 class="text-center">Detalles del Jugador</h1>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="{{ $player->photo }}" class="player-image">
        </div>
        <div class="card-text text-center">
            <h3>Nombre:</h3>
            <p>{{ $player->name }}</p>
            <h3>Posición:</h3>
            <p>{{ $player->position }}</p>
            <h3>Dorsal:</h3>
            <p>{{ $player->number }}</p>
            <h3>Instagram:</h3>
            <p>{{ $player->instagram }}</p>
            <h3>Twitch:</h3>
            <p>{{ $player->twitch }}</p>
            <h3>Twitter:</h3>
            <p>{{ $player->twitter }}</p>
        </div>
    </div>

@endsection
