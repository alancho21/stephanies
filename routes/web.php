<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\User; 
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CajeroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciosesion', function () {
    return view('InicioDeSesion');
});
Route::get('/gestionarmenu', function () {
    return view('GestionarMenu');
});
Route::get('/gestionarUsuarios', function () {
    return view('gestionarUsuarios');
});
Route::get('/menuadmin', function () {
    // Aquí puedes retornar la vista del menú del administrador
    return view('menuadmin');
})->name('menuadmin');




Route::resource('gestionarUsuarios', UserController::class);
Route::get('gestionarUsuarios/create', [UserController::class, 'create'])->name('gestionarUsuarios.create');
Route::post('gestionarUsuarios', [UserController::class, 'store'])->name('gestionarUsuarios.store');
Route::get('gestionarUsuarios/{user}/edit', [UserController::class, 'edit'])->name('gestionarUsuarios.edit');
Route::put('gestionarUsuarios/{user}', [UserController::class, 'update'])->name('gestionarUsuarios.update');
Route::delete('gestionarUsuarios/{user}', [UserController::class, 'destroy'])->name('gestionarUsuarios.destroy');





// Ruta de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');




#Route::get('Usuarios/create',[UsuariosController::class,'create'])->name('Usuarios.create');
#Route::post('Usuarios',[UsuariosController::class,'store'])->name('Usuarios.store');
#Route::get('Usuarios/{id}',[UsuariosController::class,'show'])->name('Usuarios.show');
#Route::get('Usuarios/{id}/edit',[UsuariosController::class,'edit'])->name('Usuarios.edit');
#Route::put('Usuarios/{id}',[UsuariosController::class,'update'])->name('Usuarios.update');
#Route::delete('Usuarios/{id}',[UsuariosController::class,'destroy'])->name('Usuarios.destroy');

Route::get('/cajero', function () {
    return view('Cajero');
});





Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/chefs', [OrderController::class, 'index'])->name('chefs.index');
#Route::get('/chefs', [OrderController::class, 'index']);
Route::get('/cajeroVer', [OrderController::class, 'index2']);
Route::put('/update-order-status/{id}', [OrderController::class, 'updateStatus'])->name('update.order.status');

Route::get('/cajeroCrear', [CajeroController::class, 'index']);
Route::post('/create-order', [CajeroController::class, 'create']);
Route::get('/js/app.js', function () {
    return response(file_get_contents(public_path('js/app.js')))
        ->header('Content-Type', 'text/javascript');
});


Route::get('/tendencias', [OrderController::class, 'index3'])->name('tendencias.index');

Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class);

