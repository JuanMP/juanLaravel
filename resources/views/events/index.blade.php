@extends('layout')

@section('title', 'Próximos Eventos')

@section('content')
<div class="container">
    <h1 class="text-center">Próximos Eventos</h1>

    @if ($orderEvents->isEmpty())
    <p class="text-center">No hay próximos eventos.</p>
    @else
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Etiquetas</th>
                    @auth
                    <th>Acciones</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($orderEvents as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->hour }}</td>
                    <td>{{ $event->type }}</td>
                    <td>{{ $event->tags }}</td>
                    @auth
                    <td>
                        @if (auth()->user()->isAdmin())
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">Ver detalles</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        @endif
                        @if (in_array($event->id, $likes))
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
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
