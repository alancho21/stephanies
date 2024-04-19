<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciosesion', function () {
    return view('InicioDeSesion');
});
Route::get('/gestionarmenu', function () {
    return view('GestionarMenu');
});
Route::get('/', function () {
    return view('Usuarios');
});
Route::get('/menuadmin', function () {
    return view('menuAdmin');
});

Route::get('Usuarios',[UsuariosController::class,'index'])->name('Usuarios.index');
Route::get('Usuarios/create',[UsuariosController::class,'create'])->name('Usuarios.create');
Route::post('Usuarios',[UsuariosController::class,'store'])->name('Usuarios.store');
Route::get('Usuarios/{id}',[UsuariosController::class,'show'])->name('Usuarios.show');
Route::get('Usuarios/{id}/edit',[UsuariosController::class,'edit'])->name('Usuarios.edit');
Route::put('Usuarios/{id}',[UsuariosController::class,'update'])->name('Usuarios.update');
Route::delete('Usuarios/{id}',[UsuariosController::class,'destroy'])->name('Usuarios.destroy');


Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class);

