@extends('layout')

@section('title', 'Añadir jugador')

@section('content')

<h1>Añadir jugador</h1>

<form action="{{ route('players.store') }}" method="post">
@csrf

<div class="form-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"></div>

<div class="form-group">
<label for="lastname">Posición</label>
<input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}"></div>

<div class="form-group">
<label for="number">Dorsal</label>
<input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}"></div>

<div class="form-group">
    <label for="twitter">Twitter</label>
    <input type="text" name="twitter" id="twitter" class="form-control" value="{{ old('twitter') }}">
</div>

<div class="form-group">
    <label for="instagram">Instagram</label>
    <input type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram') }}">
</div>

<div class="form-group">
    <label for="twitch">Twitch</label>
    <input type="text" name="twitch" id="twitch" class="form-control" value="{{ old('twitch') }}">
</div>

<div class="form-group">
    <label for="visibility">Visibilidad</label>
    <input type="checkbox" name="visibility" id="visibility" value="1" {{ old('visibility') ? 'checked' : '' }}>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">Añadir jugador</button>
</div>

</form>


@endsection
