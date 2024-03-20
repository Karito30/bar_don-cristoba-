<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/diseño_web/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/diseño_web/inicio.css')}}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' rel='stylesheet'>   
    <title>inicio sesion don cristobal</title>
    <div class="menu container">
        <a href="a" class="logo">Don Cristobal</a>
        <input type="checkbox" id="menu" />
        <nav class="navbar">
            <ul>
            <li><a href="pagina">Inicio</a></li>
            <li><a href="iniciosesion">Iniciar sesión</a></li>
            <li><a href="licores">Licores Exclusivos</a></li>
            <li><a href="catalogo">Catalogo</a></li>
        </ul>
        </nav>
    </div>
</head>
<body>
    <div class="main-parent">
        <div class="form-wrap">
            
            <form method="post">
            @csrf
                <h1><span>Inicio Sesion</span></h1>
                <div class="single-input">
                </div>
                <div class="single-input">
                    <label>
                    <input id="correo electronico" type="email" size="64" maxLength="64" required placeholder="correo electronico".+@gmail\.com name="correo">
                    </label>
                </div>
                <div class="single-input">                      
                    <input required type="password" id="creacionPw" placeholder="contraseña" name="clave">                 
                    <i class='fas fa-eye-slash' ></i>
                </div>                                          
                
                <div class="submit-button">
                  <button class="button" type="submit">Enviar</button>
                </div>
                <div class="account-have">
                    <a href="recuperar">¿Has olvidado tu contraseña?</a>
                    <a href="registro">crea una cuenta</a>
                </div>
            </form>
        </div>
    </div> 
    
    <script src="inicio.js"></script>
</body>
</html>