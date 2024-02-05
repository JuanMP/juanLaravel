@extends('layout')

@section('title', 'Añadir jugador')

@section('content')

<h1>Añadir jugador</h1>

<form action="{{ route('movies') }}" method="post">
@csrf

<div class="form-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"></div>

<div class="form-group">
<label for="lastname">Apellidos</label>
<input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}"></div>

<div class="form-group">
<label for="birthdate">Edad</label>
<input type="text" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate') }}"></div>

<div class="form-group">
<label for="number">Dorsal</label>
<input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}"></div>

<div class="form-group">
<button type="submit" class="btn btn-primary">Añadir jugador</button>
</div>

</form>


@endsection
