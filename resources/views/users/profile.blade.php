@extends('layout')

@section('title', 'Perfil');

@section('content')

    <h1>Mi Perfil</h1>
    <p>Nombre {{ $user->name }}</p>
    <p>Nombre de usuario {{ $user->name }}</p>
    <p>Email {{ $user->email }}</p>
    <p>Tipo de cuenta {{ $user->rol }}</p>

@endsection
