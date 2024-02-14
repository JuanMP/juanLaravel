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
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <br>Error:{{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                    @error('subject')
                        <br>Error:{{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">Texto</label>
                    <textarea class="form-control" id="text" name="text" rows="5" value="{{ old('text') }}" required></textarea>
                    @error('text')
                        <br>Error:{{ $message }}
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="readed" name="readed">
                    <label class="form-check-label" for="readed">Leído</label>
                    @error('checkbox')
                        <br>Error:{{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Crear Mensaje</button>
            </form>
        </div>
    </div>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



@endsection
