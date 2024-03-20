<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Don Cristobal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link  href="css/diseño_web/principal.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
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
                <li><a href="#" id="darkModeToggle"><i class="fas fa-adjust"></i></a></li>
            </ul>
        </div>
    </div>
    
     <!-- Código QR -->
     <div class="qr-code">
        <img src="{{ URL::asset('css/diseño_web/imagen/catalogo.png') }}" alt="Código QR">
    </div>

    <div class="carousel">
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/aguardiente.png') }}" alt="Aguardiente">
            <figcaption>Aguardiente</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/brandy.png') }}" alt="Brandy">
            <figcaption>Brandy</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/coñag.png') }}" alt="Coñac">
            <figcaption>Coñac</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/whisky.png') }}" alt="Whisky">
            <figcaption>Whisky</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/ron.png') }}" alt="Ron">
            <figcaption>Ron</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/tequila.png') }}" alt="Tequila">
            <figcaption>Tequila</figcaption>
        </div>
        <div class="carousel-item">
            <img src="{{ URL::asset('css/diseño_web/imagen/vodka.png') }}" alt="Vodka">
            <figcaption>Vodka</figcaption>
        </div>
       
    </div>

    <footer class="site-footer">
        <div class="footer-row">
            <p>&copy; 2023 Don Cristobal</p>
            <p>Dirección: Cl. 38 Sur #73f-18</p>
            <p>Teléfono: 123-456-789</p>
        </div>
        <div class="footer-row">
            <p>Creado Por:</p>
            <p>Paula Gomez</p>
            <p>Karen Cortes</p>
            <p>Mariana Castellanos</p>
            <p>Karol Ovalle</p>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
      $(document).ready(function(){
    $('.carousel').slick({
        autoplay: true,
        dots: false, // Desactiva los números de página
        arrows: false, // Desactiva los controles "Next" y "Previous"
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});

function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle('dark-mode'); // Toggle dark mode class on body
}

// Event listener para el botón de cambiar modo
const darkModeToggle = document.getElementById('darkModeToggle');
darkModeToggle.addEventListener('click', toggleDarkMode);
    </script>
</body>
</html>
