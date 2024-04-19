<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;       
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
Route::get('/usuarios', function () {
    return view('Usuarios');
});
Route::get('/menuadmin', function () {
    return view('MenuAdmin');
});

Route::get('Usuarios',[UsuariosController::class,'index'])->name('Usuarios.index');
Route::get('Usuarios/create',[UsuariosController::class,'create'])->name('Usuarios.create');
Route::post('Usuarios',[UsuariosController::class,'store'])->name('Usuarios.store');
Route::get('Usuarios/{id}',[UsuariosController::class,'show'])->name('Usuarios.show');
Route::get('Usuarios/{id}/edit',[UsuariosController::class,'edit'])->name('Usuarios.edit');
Route::put('Usuarios/{id}',[UsuariosController::class,'update'])->name('Usuarios.update');
Route::delete('Usuarios/{id}',[UsuariosController::class,'destroy'])->name('Usuarios.destroy');

Route::get('/cajero', function () {
    return view('Cajero');
});


Route::get('/inicio', function () {
    return view('inicio');
});


Route::get('/chefs', [OrderController::class, 'index']);
Route::get('/cajeroVer', [OrderController::class, 'index2']);
Route::get('/cajeroCrear', [CajeroController::class, 'index']);
Route::post('/create-order', [CajeroController::class, 'create']);
Route::get('/js/app.js', function () {
    return response(file_get_contents(public_path('js/app.js')))
        ->header('Content-Type', 'text/javascript');
});

Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class);

