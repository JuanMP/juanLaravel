@extends('layout')

@section('title', 'Página de Tienda')

@section('content')

<h1 class="text-center">Tienda del Valencia CF</h1>


    @auth
    <div class="text-center">
        @foreach($products as $product)
        <h3>{{ $product->name }}</h3>
        <h4>{{ $product->price }} €</h4>
        <h4>{{ $product->stock }} Uds</h4>
        <img src="{{ $product->photo }}" alt="foto camiseta" class="player-image">
        @endforeach
    </div>
    @endauth

@endsection
