<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/diseño_web/style1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/diseño_web/inicio.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>recupara contraseña don cristobal</title>
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
    <script>
        function verifica(){
        alert('Hemos enviado su nueva contraseña al correo.');
        }
        </script>
    <div class="main-parent">
        <div class="form-wrap">
            <form action="">
                <h1><span>Recuperar Contraseña</span></h1>
                <div class="single-input">
                </div>
                <div class="single-input">
                    <input id="correo electronico" type="email" size="64" maxLength="64" required placeholder="correo electronico" pattern=".+@gmail\.com">
                </div>
                
                <div class="submit-button">
                    <script type="text/javascript">
                    function verifica() {
                        alert("Hemos enviado su nueva contraseña a su correo.")
                    }
                    </script>
                    <button type="submit" onclick="verifica()"><a href="iniciosesion">Enviar</a></button>
                </div>
                
                <div class="account-have">
                    <a href="iniciosesion"> iniciar sesión</a>
                </div>
            </form>
        </div>
    </div>
  
    <script src="index1.js"></script>
    <script src="sweetalert.js"></script>
</body>
</html>