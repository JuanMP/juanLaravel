@extends('layout')

@section('title', 'Página de Registro')

@section('content')

<form action="{{ route('signup') }}" method="post">
    @csrf
    <label for="username">Nombre de usuario</label>
    <input type="text" name="username" id="username" value="{{ old('username') }}"><br>

    <label for="name">Nombre completo</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}"><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password"><br>

    <label for="password_confirmation">Confirmar Contraseña:</label><br>
    <input type="password" name="password_confirmation" id="password_confirmation"><br>

    <button type="submit">Registrarse</button>
</form>


@if($errors->any())
    <ul>
        @foreach  ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


@endsection
