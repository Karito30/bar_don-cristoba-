@component('mail::message')
# Bienvenido a nuestra aplicación

Para activar tu cuenta, haz clic en el siguiente botón:

@component('mail::button', ['url' => $url])
Activar Cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
