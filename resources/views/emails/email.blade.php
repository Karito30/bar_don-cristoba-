@component('mail::message')
# Restablecer Contraseña

Estás recibiendo este correo porque solicitaste restablecer tu contraseña.

@component('mail::button', ['url' => route('password.reset', ['token' => $user->remember_token, 'email' => $user->email])])
Restablecer Contraseña
@endcomponent

Si no solicitaste restablecer tu contraseña, no es necesario realizar ninguna acción.

Saludos,<br>
{{ config('app.name') }}
@endcomponent
