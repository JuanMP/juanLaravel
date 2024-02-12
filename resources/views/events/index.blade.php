@extends('layout')

@section('title', 'Página de Eventos')

@section('content')

<h2 class="text-center">Eventos</h2>

@foreach($events as $event)
<div class="text-center">
<p>{{ $event->name }}</p>
<p>{{ $event->description }}</p>
<p>{{ $event->location }}</p>
<p>{{ $event->date }}</p>
<p>{{ $event->hour }}</p>
<p>{{ $event->type }}</p>
<p>{{ $event->tags }}</p>
</div>
@endforeach

@endsection
