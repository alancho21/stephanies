<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciosesion', function () {
    return view('InicioDeSesion');
});
Route::get('/gestionarmenu', function () {
    return view('gestionarMenu');
});
Route::get('/gestionarusuarios', function () {
    return view('gestionarusuarios');
});
Route::get('/menuadmin', function () {
    return view('MenuAdmin');
});

Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class);

