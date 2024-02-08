@extends('layout')

@section('title', 'Perfil')

@section('content')

    <h1>Mi Perfil</h1>
    <p>Nombre de usuario: {{ $user->username }}</p>
    <p>Nombre: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Fecha de nacimiento: {{ $user->birthday }}</p>
    <p>Tipo de cuenta: {{ $user->rol }}</p>

@endsection
