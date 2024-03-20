<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/diseño_web/inicio.css')}}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' rel='stylesheet'>
    <title>Registro don cristobal</title>
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

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Registrarse</h1>
        <!-- Name -->
        <div class="single-input">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="single-input">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="single-input">
            <x-input-label for="password" :value="__('Contraseña')" />
        
            <div class="password-container">
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                    <i class="far fa-eye" id="eye-icon"></i>
                </button>
            </div>
        
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
   
        <!-- Confirm Password -->
        <div class="single-input">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
        
            <div class="password-toggle">
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <i class="far fa-eye" id="togglePasswordConfirmation" onclick="togglePasswordConfirmation('password_confirmation', 'togglePasswordConfirmation')"></i>
            </div>
        
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
   <!-- Selección de Roles -->
   <div class="single">
    <label for="role" class="block font-medium text-sm text-gray-700">Seleccionar Rol(es)</label>

    @foreach($roles as $role)
        <div class="flex items-center mt-2">
            <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->name }}" class="mr-2">
            <label for="role_{{ $role->id }}">{{ $role->name }}</label>
        </div>
    @endforeach

    <!-- Mostrar mensajes de error si los hay -->
    <x-input-error :messages="$errors->get('roles')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}">
                {{ __('Ya estas registrado?') }}
            </a>

            <div class="submit-button">
            <button class="button">
                {{ __('registrar') }}
            </button>
            </div>
        </div>
    </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');
    
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('far', 'fa-eye');
                eyeIcon.classList.add('far', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('far', 'fa-eye-slash');
                eyeIcon.classList.add('far', 'fa-eye');
            }
        }
        function togglePasswordConfirmation(inputId, iconId) {
        var passwordInput = $('#' + inputId);
        var eyeIcon = $('#' + iconId);

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.removeClass('far fa-eye').addClass('far fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.removeClass('far fa-eye-slash').addClass('far fa-eye');
        }
    }
    </script>
    
</body>
</html>