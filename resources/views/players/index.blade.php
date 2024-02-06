@extends('layout')

@section('title', 'Página de jugadores')

@section('content')

    <h1>Plantilla Valencia CF</h1>

    <ul>
        @auth
        @foreach($players as $player)
        <li>
            Nombre: {{ $player->name }}
            <br>
            Posición: {{ $player->position }}
            <br>
            Dorsal: {{ $player->number }}
        </li>
        @endforeach
        @endauth
    </ul>


@endsection
