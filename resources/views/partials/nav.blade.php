<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-headed">
            <a class="navbar-brand" href="/">
                <img src="/img/others/favicon.png" alt="logo" class="brand-img"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}">Página Principal</a></li>
            <li><a href="{{ route('players') }}">Plantilla</a></li>
            <li><a href="{{ route('events') }}">Eventos</a></li>
            <li><a href="{{ route('store') }}">Tienda</a></li>
            <li><a href="{{ route('contact') }}">Contacto</a></li>
            <li><a href="{{ route('location') }}">Localización</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (!auth()->check()) <!-- Si el usuario no ha iniciado sesión -->
                <li><a href="{{ route('signupForm') }}"><span class="glyphicon glyphicon-user"></span>Regístrate</a></li>
                <li><a href="{{ route('loginForm') }}"><span class="glyphicon glyphicon-log-in"></span>Iniciar sesión</a></li>
                <li><a href="{{ route('users.profile') }}"><span class="glyphicon glyphicon-user"></span>Admin</a></li>
            @else <!-- Si el usuario ha iniciado sesión -->
                @if (auth()->user()->rol === 'admin')
                    <li><a href="{{ route('admin.profile') }}"><span class="glyphicon glyphicon-user"></span>Admin</a></li>
                @else
                    <li><a href="{{ route('users.profile') }}"><span class="glyphicon glyphicon-user"></span>Mi Perfil</a></li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-link">Cerrar sesión</button>
                    </form>
                </li>
            @endif
        </ul>

    </div>
</nav>





