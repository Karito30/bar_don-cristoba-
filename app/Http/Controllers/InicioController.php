<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function inicio()
    {
        return view('diseño_web/pagina');
    }

    public function iniciosesion()
    {
        return view('diseño_web/iniciosesion');
    }

    public function recuperar()
    {
        return view('auth.forgot_password');
    }

    public function registro()
    {
        return view('diseño_web/registro');
    }

    public function catalogo()
    {
        return view('catalogo.productos');
    }

    public function dash()
    {
        return view('dashboard.union');
    }

    public function venta()
    {
        return view('venta.index');
    }
    
   
}
