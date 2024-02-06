@extends('layout')

@section('title', 'Añadir jugador')

@section('content')

<h1>Añadir jugador</h1>

<form action="{{ route('players.store') }}" enctype="multipart/form-data" method="post">
@csrf

<div class="form-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
@error('name')
    <br>Error:{{ $message }}
@enderror
</div>

<div class="form-group">
<label for="position">Posición</label>
<input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}">
@error('position')
    <br>Error:{{ $message }}
@enderror
</div>

<div class="form-group">
<label for="number">Dorsal</label>
<input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}">
@error('number')
    <br>Error:{{ $message }}
@enderror
</div>

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
    <label for="photo">Foto</label>
    <input type="file" name="photo" id="photo" class="form-control-file">
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
