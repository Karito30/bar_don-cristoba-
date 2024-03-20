@component('mail::message')

Hola,

Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.

@component('mail::button', ['url' => route('password.reset', [ 'email' => $email])])
Reset Password
@endcomponent


Este enlace para restablecer la contraseña caducará en 60 minutos.

Si no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna acción adicional.

Saludos,
{{ config('app.name') }}
@endcomponent
