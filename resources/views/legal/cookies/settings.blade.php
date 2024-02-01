@extends('layout')

@section('title', 'Configuración de Cookies')

@section('content')
    <h1>Configuración de Cookies</h1>
    <p>Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Puede personalizar su configuración de cookies a continuación:</p>
    <form action="/guardar-configuracion-de-cookies" method="post">
        @csrf
        <div>
            <input type="checkbox" id="cookie_analiticas" name="cookie_analiticas">
            <label for="cookie_analiticas">Cookies Analíticas</label>
            <p>Estas cookies nos permiten analizar cómo los usuarios interactúan con nuestro sitio web para mejorar su funcionamiento.</p>
        </div>
        <div>
            <input type="checkbox" id="cookie_personalizacion" name="cookie_personalizacion">
            <label for="cookie_personalizacion">Cookies de Personalización</label>
            <p>Estas cookies nos permiten recordar las preferencias del usuario, como el idioma seleccionado.</p>
        </div>
        <div>
            <input type="checkbox" id="cookie_publicidad" name="cookie_publicidad">
            <label for="cookie_publicidad">Cookies de Publicidad</label>
            <p>Estas cookies nos permiten mostrar publicidad personalizada basada en los intereses del usuario.</p>
        </div>
        <button type="submit">Guardar configuración</button>
    </form>
@endsection
