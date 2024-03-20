<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/diseño_web/inicio.css')}}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' rel='stylesheet'>
    <title>Recuperar Contraseñal</title>
    <header class="header">
</head>
<body>
    <div class="menu-bar">
        <div class="menu-bar-logo">
            <img src="{{ URL::asset('css/diseño_web/imagen/d.png') }}" alt="Logo">
        </div>
        <h3>Don Cristobal</h3>
        <div class="menu-bar-items">
            <ul>
                @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" >Iniciar Sesión</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Registro</a></li>
                    @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
    <div class="main-parent">
        <div class="form-wrap">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1>Recuperar Contraseña</h1>
                <!-- Email -->
                <div class="single-input">
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email"
                                  name="email"
                                  required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}">
                        {{ __('inicio de sesión') }}
                    </a>
                    <div class="submit-button">
                        <button class="button">
                            {{ __('Enviar  recuperación') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
