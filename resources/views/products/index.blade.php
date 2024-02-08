@extends('layout')

@section('title', 'Página de Tienda')

@section('content')

<h1 class="text-center">Tienda del Valencia CF</h1>


    @auth
    <div class="text-center">
    <img src="/img/products/localshirt.jpeg" alt="Imagen 1" class="img-fluid">
        @foreach($products as $product)
        <h3>{{ $product->name }}</h3>
        <h4>{{ $product->price }} €</h4>
        <h4>{{ $product->stock }} Uds</h4>
        @endforeach
    </div>
    @endauth

@endsection
