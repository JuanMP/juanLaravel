@extends('layout')

@section('title', 'Jugador guardado')

@section('content')

<h1>Jugador añadido</h1>
<p>Jugador: {{ $player->name }}</p>
<p>Posicion: {{ $player->position }}</p>
<p>Dorsal: {{ $player->number}} </p>

@endsection
