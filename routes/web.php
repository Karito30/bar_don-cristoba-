<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Notifications1Controller;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|Rutas del sistema
*/

Route::get('/', function () {
    return view('diseño_web.pagina');
});


Route::get('/dashboard', function () {
    return view('dashboard.union');
})->middleware(['auth', 'verified'])->name('dashboard');



/*
|dashboard
*/

Route::get('/union', [InicioController::class,'union']);


/*--------Diseño web---------------*/


Route::get('/', [InicioController::class,'inicio']);

Route::get('/a', [InicioController::class,'inicio']);

Route::get('/pagina', [InicioController::class,'inicio']);

Route::get('/registro', [InicioController::class,'registro']);

Route::get('/forgot_password', [InicioController::class,'forgot_password']);

Route::get('/catalogo', [InicioController::class,'catalogo']);

/*----------venta---------*/

Route::get('venta',[VentaController::class,'index'])->name('venta.index');
Route::get('venta/create',[VentaController::class,'create'])->name('venta.create');
Route::post('venta',[VentaController::class,'store'])->name('venta.store');
Route::get('venta/{id}/edit',[VentaController::class,'edit'])->name('venta.edit');
Route::put('venta/{id}',[VentaController::class,'update'])->name('venta.update');
Route::delete('venta/{id}',[VentaController::class,'destroy'])->name('venta.destroy');
/**excel venta**/
Route::get('/excel_venta', function () {
    return view('venta.excel_venta');
});
/**pdf venta */
Route::get('venta/pdf',[VentaController::class,'pdf'])->name('venta.pdf');





/*----------proveedor---------*/

Route::get('proveedor',[ProveedorController::class,'index'])->name('proveedor.index');
Route::get('proveedor/create',[ProveedorController::class,'create'])->name('proveedor.create');
Route::post('proveedor',[ProveedorController::class,'store'])->name('proveedor.store');
Route::get('proveedor/{id}/edit',[ProveedorController::class,'edit'])->name('proveedor.edit');
Route::put('proveedor/{id}',[ProveedorController::class,'update'])->name('proveedor.update');
Route::delete('proveedor/{id}',[ProveedorController::class,'destroy'])->name('proveedor.destroy');
/**excel proveedor**/
Route::get('/proveedor.excel_proveedor', function () {
    return view('proveedor.excel_proveedor');
});

/**pdf proveedor */
Route::get('proveedor/pdf',[ProveedorController::class,'pdf'])->name('proveedor.pdf');

/*----------producto---------*/

Route::get('producto',[ProductoController::class,'index'])->name('producto.index');
Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('producto',[ProductoController::class,'store'])->name('producto.store');
Route::get('producto/{id}/edit',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');
Route::delete('producto/{id}',[ProductoController::class,'destroy'])->name('producto.destroy');
/**excel  producto**/
Route::get('/excel_producto', function () {
    return view('producto.excel_producto');
});
/**pdf producto */
Route::get('producto/pdf',[ProductoController::class,'pdf'])->name('producto.pdf');

/*----------pedido---------*/

Route::get('pedido',[PedidoController::class,'index'])->name('pedido.index');
Route::get('pedido/create',[PedidoController::class,'create'])->name('pedido.create');
Route::post('pedido',[PedidoController::class,'store'])->name('pedido.store');
Route::get('pedido/{id}/edit',[PedidoController::class,'edit'])->name('pedido.edit');
Route::put('pedido/{id}',[PedidoController::class,'update'])->name('pedido.update');
Route::delete('pedido/{id}',[PedidoController::class,'destroy'])->name('pedido.destroy');
/**excel pedido**/
Route::get('/excel_pedido', function () {
    return view('pedido.excel_pedido');
});
/**pdf producto */
Route::get('pedido/pdf',[PedidoController::class,'pdf'])->name('pedido.pdf');


/*----------empleado---------*/

Route::get('empleado',[EmpleadoController::class,'index'])->name('empleado.index');
Route::get('empleado/create',[EmpleadoController::class,'create'])->name('empleado.create');
Route::post('empleado',[EmpleadoController::class,'store'])->name('empleado.store');
Route::get('empleado/{id}/edit',[EmpleadoController::class,'edit'])->name('empleado.edit');
Route::put('empleado/{id}',[EmpleadoController::class,'update'])->name('empleado.update');
Route::delete('empleado/{id}',[EmpleadoController::class,'destroy'])->name('empleado.destroy');
/**excel empleado**/
Route::get('/excel_empleado', function () {
    return view('empleado.excel_empleado');
});;
/**pdf producto */
Route::get('empleado/pdf',[EmpleadoController::class,'pdf'])->name('empleado.pdf');

//auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

require __DIR__.'/auth.php';

//**cerrar seccion */

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


//**notificaciones */
Route::get('mark_all_Notifications', [NotificationsController::class, 'mark_all_Notifications'])->name('mark_all_Notifications');

Route::get('mark_a_Notification/{notification_id}/{pedido_id}', [NotificationsController::class, 'mark_a_Notification'])->name('mark_a_Notification');

//  reset de contraseña
Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::put('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

