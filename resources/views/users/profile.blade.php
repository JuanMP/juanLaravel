@extends('layout')

@section('title', 'Perfil')

@section('content')

<div style="display: flex; align-items: center; text-align: center;">
    <div style="width: 50%; text-align: left;">
        <h1>Mi Perfil</h1>
        <p>Nombre de usuario: {{ $user->username }}</p>
        <p>Nombre: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Fecha de nacimiento: {{ $user->birthday }}</p>
        <p>Tipo de cuenta: {{ $user->rol }}</p>
        <a href="{{ route('users.edit', $user)}}" class="btn btn-primary">Editar datos</a>
    </div>
    <div class="aroundProfile">
        <img class="profile" src="/img/others/account.jpg" alt="Imagen 1" class="img-fluid">
    </div>
</div>

@endsection
