@extends('layout')

@section('title', 'Página de Envío de mensaje')

@section('content')

    <h3>Envía un mensaje</h3>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="text">Texto</label>
                    <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="readed" name="readed">
                    <label class="form-check-label" for="readed">Leído</label>
                </div>
                <button type="submit" class="btn btn-primary">Crear Mensaje</button>
            </form>
        </div>
    </div>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif



@endsection
