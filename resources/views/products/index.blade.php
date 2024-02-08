@extends('layout')

@section('title', 'Página de Tienda')

@section('content')

<h1 class="text-center">Tienda del Valencia CF</h1>

@auth
<div class="juan text-center">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                <a href="{{ route('products.show', ['product' => $product->id]) }}" class="image-link">
                    <img src="{{ $product->photo }}" alt="foto camiseta" class="card-img-top store-image">
                </a>
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <h4>{{ $product->price }} €</h4>
                    <h4>{{ $product->stock }} Uds</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endauth

@endsection
