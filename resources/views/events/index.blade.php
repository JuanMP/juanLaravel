@extends('layout')

@section('title', 'Próximos Eventos')

@section('content')
    <div class="container">
        <h1 class="text-center">Próximos Eventos</h1>

        @if ($orderEvents->isEmpty())
            <p class="text-center">No hay próximos eventos.</p>
        @else
            <div class="row">
                @foreach ($orderEvents as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $event->name }}</h4>
                                <p class="card-text">{{ $event->description }}</p>
                                <ul class="list-unstyled">
                                    <li><strong>Ubicación:</strong> {{ $event->location }}</li>
                                    <li><strong>Fecha:</strong> {{ $event->date }}</li>
                                    <li><strong>Hora:</strong> {{ $event->hour }}</li>
                                    <li><strong>Tipo:</strong> {{ ($event->type) }}</li>
                                    <li><strong>Etiquetas:</strong> {{ $event->tags }}</li>
                                </ul>
                                @if (auth()->user()->isAdmin())
                                <a href="{{ route('events.edit', $event) }}">Editar</a>
                                <form action="{{ route('events.destroy', $event) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                                </form>
                                @endif
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
