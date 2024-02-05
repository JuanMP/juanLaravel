@extends('layout')

@section('title', 'Añadir evento')

@section('content')

<h1>Añadir evento</h1>

<form action="{{ route('events.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="location">Ubicación</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
    </div>

    <div class="form-group">
        <label for="date">Fecha</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
    </div>

    <div class="form-group">
        <label for="hour">Hora</label>
        <input type="time" name="hour" id="hour" class="form-control" value="{{ old('hour') }}">
    </div>

    <div class="form-group">
        <label for="type">Tipo</label>
        <select name="type" id="type" class="form-control">
            <option value="official" {{ old('type') === 'official' ? 'selected' : '' }}>Oficial</option>
            <option value="exhibition" {{ old('type') === 'exhibition' ? 'selected' : '' }}>Exhibición</option>
            <option value="charity" {{ old('type') === 'charity' ? 'selected' : '' }}>Caridad</option>
        </select>
    </div>

    <div class="form-group">
        <label for="tags">Etiquetas</label>
        <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
    </div>

    <button type="submit" class="btn btn-primary">Añadir evento</button>
</form>

@endsection
