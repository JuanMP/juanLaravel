@extends('layout')

@section('title', 'Editar Evento')

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Evento</h1>

        <form action="{{ route('events.update', $event) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="location">Ubicación:</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}">
            </div>

            <div class="form-group">
                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}">
            </div>

            <div class="form-group">
                <label for="hour">Hora:</label>
                <input type="time" name="hour" id="hour" class="form-control" value="{{ $event->hour }}">
            </div>

            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" id="type" class="form-control">
                    <option value="official" {{ $event->type === 'official' ? 'selected' : '' }}>Oficial</option>
                    <option value="exhibition" {{ $event->type === 'exhibition' ? 'selected' : '' }}>Exhibición</option>
                    <option value="charity" {{ $event->type === 'charity' ? 'selected' : '' }}>Caridad</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Etiquetas:</label>
                <input type="text" name="tags" id="tags" class="form-control" value="{{ $event->tags }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
