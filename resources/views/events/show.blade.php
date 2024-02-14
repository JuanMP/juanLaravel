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

<a href="{{ route('events.index') }}">Volver</a>

@endsection
