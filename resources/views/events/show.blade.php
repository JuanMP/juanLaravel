@extends('layout')


@section('title', 'Detalle de un evento')

@section('content')


<h1>Detalles del Evento</h1>
<p>Nombre: {{ $event->name }}</p>
<p>Descripción: {{ $event->description }}</p>
<p>Ubicación: {{ $event->location }}</p>
<p>Fecha del Evento: {{ $event->date }}</p>
<p>Hora del Evento: {{ $event->hour}} </p>
<p>Tipo de Evento: {{ $event->type }}</p>
<p>Etiquetas: {{ $event->tags }}</p>
<p>Visible ? {{ $event->visible ? 'Sí' : 'No' }}</p>

@if(auth()->check() && auth()->user()->likedEvents->contains($event))
    <form action="{{ route('event.deleteLike', $event->id) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Ya no me gusta</button>
    </form>
@else
    <form action="{{ route('event.like', $event->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">Me gusta</button>
    </form>
@endif
<br>

<a href="{{ route('events.index') }}" class="btn btn-primary mt-3 btn-sm">Volver</a>

@endsection
