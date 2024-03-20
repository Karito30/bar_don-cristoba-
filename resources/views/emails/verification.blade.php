<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('template.plantilla')
    @section('contenedor')
    
<p>Hola,</p>

<p>Gracias por registrarte. Por favor, haz clic en el siguiente enlace para verificar tu correo electrónico:</p>

<a href="{{ $verificationLink }}">Verificar Correo Electrónico</a>

<p>Gracias,</p>
<p>Don Cristobal</p>
    @endsection
</body>
</html>