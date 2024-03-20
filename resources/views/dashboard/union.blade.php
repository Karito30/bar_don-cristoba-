<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/union.css') }}" >
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">



</head>
<body>
      @role('Admin')
    <div class="sidebar">
        <div class="logo"> </div>
            <ul class="menu">
                <li class="active">
                    
                    <a href="">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="catalogo" target="3">
                        <i class="las la-clipboard-check"></i>
                        <span>Catalogo</span>
                    </a>
                </li>
               
                <li>
                    <a href="{{ route('empleado.index') }}" target="mainContent">
                        <i class="las la-user-alt"></i>
                        <span>Rol</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('venta.index') }}" target="mainContent">
                        <i class="las la-file"></i>
                        <span>Venta</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('producto.index') }}" target="mainContent">
                        <i class="las la-clipboard-check"></i>
                        <span>Inventario</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('proveedor.index') }}" target="mainContent">
                        <i class="las la-truck"></i>
                        <span>Proveedor</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pedido.index') }}" target="mainContent">
                        <i class="las la-coins"></i>
                        <span>Pedido</span>
                    </a>
                </li>
               
                <li class="logout">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
                
               
            </ul>
            <a href="javascript:()" onclick="document.getElementById('logout-form').submit(); return false;">
                <i class="fa fa-lg fa-sign-out-alt text-danger"></i> Cerrar sesión
            </a>
            
            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                @csrf
            </form>
            
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Administrador</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <div class="searh--box"> 
                    <span>{{ Auth::user()->name }}</span>
                &nbsp;
                    <i class="fas fa-user"></i>
            </div>
           
            <img src="{{ URL::asset('css/diseño_web/imagen/d.png') }}" alt="">
            </div>
        </div>
        <iframe name="mainContent" id="mainContent" width="100%" height="600px" frameborder="0"></iframe>
    </div>

@endrole
@role('Empleado')
<div class="sidebar">
    <div class="logo"> </div>
        <ul class="menu">
            <li class="active">
                
                <a href="">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="catalogo" target="3">
                    <i class="las la-clipboard-check"></i>
                    <span>Catalogo</span>
                </a>
            </li>
            <li>
                <a href="{{ route('producto.index') }}" target="mainContent">
                    <i class="las la-clipboard-check"></i>
                    <span>Inventario</span>
                </a>
            </li>
           
            <li>
                <a href="{{ route('venta.index') }}" target="mainContent">
                    <i class="las la-file"></i>
                    <span>Venta</span>
                </a>
            </li>
          
           
            <li class="logout">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </li>
            
           
        </ul>
        <a href="javascript:()" onclick="document.getElementById('logout-form').submit(); return false;">
            <i class="fa fa-lg fa-sign-out-alt text-danger"></i> Cerrar sesión
        </a>
        
        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
            @csrf
        </form>
</div>

<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Empleado</span>
            <h2>Dashboard</h2>
        </div>
        <div class="user--info">
            <div class="searh--box">
                <span>{{ Auth::user()->name }}</span>
                &nbsp;
                <i class="fas fa-user"></i> 
        </div>
        <img src="{{ URL::asset('css/diseño_web/imagen/d.png') }}" alt="">
        </div>
    </div>
    <iframe name="mainContent" id="mainContent" width="100%" height="600px" frameborder="0"></iframe>
</div>
@endrole
@role('Proveedor')
<div class="sidebar">
    <div class="logo"> </div>
        <ul class="menu">
            <li class="active">
                
                <a href="">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
            <a href="{{ route('pedido.index') }}" target="mainContent">
                <i class="las la-coins"></i>
                <span>Pedido</span>
            </a>
        </li>
           
        <li class="logout">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
            </a>
        </li>
        
       
    </ul>
    <a href="javascript:()" onclick="document.getElementById('logout-form').submit(); return false;">
        <i class="fa fa-lg fa-sign-out-alt text-danger"></i> Cerrar sesión
    </a>
    
    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Proveedor</span>
            <h2>Dashboard</h2>
        </div>
        <div class="user--info">
            <div class="searh--box">
            <span>{{ Auth::user()->name }}</span>
            &nbsp;
            <i class="fas fa-truck"></i>
        </div>
        <li class="nav-item ">
            <a class=" count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="fas fa-bell mx-0"></i>
                <span class="count">
                    {{ auth()->user()->unreadNotifications->count()}}
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left">Tienes {{ auth()->user
                    ()->unreadNotifications->count()}} notificaciones nuevas
                </p>
                <a class="dropdown-item" href="{{route('mark_all_Notifications')}}">
                    <span class="badge badge-warning float-right">
                        Ver todo
                    </span>

                 
                   
                </a>
                  @foreach (auth()->user()->unreadNotifications as $notification)
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="{{ route('mark_a_Notification', ['notification_id' => $notification->id, 'pedido_id' => $notification->data['pedido_id']]) }}">
                      <div class="preview-thumbnail">
                         
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-medium">
                            @if ($notification->type == 'App\Notifications\Pedidos')
                                Nuevo Pedido
                            @endif
                          </h6>
                          <p class="font-weight-light small-text">
                            @if(isset($notification->data['name']))
                            {{$notification->data['name']}} ha realizado un pedido
                        @else
                            El Administrador ha realizado un pedido 
                        @endif
                        </p>
                      </div>
                  </a>  
                  @endforeach
        </li>
       
        <img src="{{ URL::asset('css/diseño_web/imagen/d.png') }}" alt="">
        </div>
    </div>
    <iframe name="mainContent" id="mainContent" width="100%" height="600px" frameborder="0"></iframe>
</div>
@endrole


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>