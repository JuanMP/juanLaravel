@extends('layout')

@section('title', 'Perfil de Invitado');

@section('content')

    <h1>Perfil de Invitado</h1>
    <p>Nombre {{ $user->name }}</p>
    <p>Nombre de usuario {{ $user->name }}</p>
    <p>Email {{ $user->email }}</p>
    <p>Tipo de cuenta {{ $user->rol }}</p>

@endsection
