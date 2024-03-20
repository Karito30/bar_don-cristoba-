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
    @section('content')
    <div>
        <h1>Notificaciones de Proveedores</h1>

        @foreach ($unreadNotifications as $notification)
            <div>
                {{ $notification->data['message'] }}
            </div>
        @endforeach

        @if ($unreadNotificationss>isEmpty())
            <p>No tienes notificaciones de proveedores sin leer.</p>
        @endif
    </div>
@endsection
</body>
</html>