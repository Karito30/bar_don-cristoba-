<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/diseño_web/recuperar.css')}}">
    <title>Restablecer Contraseña</title>
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <h1>Restablecer Contraseña</h1>
            @method('PUT') 
            <div class="single-input">
            <input type="hidden" name="token" value="{{ $token }}">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            </div>
           <div class="single-input">
            <label for="password">Nueva Contraseña</label>
            <div class="password-input">
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                    <i id="eyeIconPassword" class="far fa-eye"></i>
                </span>
            </div>
           </div>
            <div class="single-input">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <div class="password-input">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">
                        <i id="eyeIconConfirm" class="far fa-eye"></i>
                    </span>
                </div>
            </div>
            <div class="submit-button">
                <button type="submit">Restablecer Contraseña</button>
            </div>
        </form>
    </div>

    <!-- Agregar FontAwesome para los iconos de ojo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>

    <script>
        function togglePasswordVisibility(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var eyeIcon = document.getElementById(fieldId === 'password' ? 'eyeIconPassword' : 'eyeIconConfirm');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("far", "fa-eye");
                eyeIcon.classList.add("fas", "fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fas", "fa-eye-slash");
                eyeIcon.classList.add("far", "fa-eye");
            }
        }
    </script>
</body>
</html>
