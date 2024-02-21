@extends('layout')

@section('title', 'Donde estamos')

@section('content')

<div class="location">
    <h1 class="text-center">Donde estamos ?</h1>
    <strong class="text-center">Estamos ubicados en</strong>
    <br>
    <br>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12318.765701938728!2d-0.38483223104882375!3d39.476299293802626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6048bd2129f74b%3A0x7504540b8de53e49!2sEstadio%20de%20Mestalla!5e0!3m2!1ses!2ses!4v1707307198547!5m2!1ses!2ses"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </div>
</div>

@endsection
