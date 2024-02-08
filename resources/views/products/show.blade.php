@extends('layout')

@section('title', 'Página de Artículo')

@section('content')

<div class="text-center">
<h1>{{ $product->name }}</h1>

<img src="{{ $product->photo }}" class="store-show">
<br>
<br>
<h3>Precio: {{ $product->price }} €</h3>
<h3>Disponibilidad: + {{ $product->stock }}</h3>
</div>

@endsection
