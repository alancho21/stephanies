<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciosesion', function () {
    return view('inicioSesion');
});
Route::get('/gestionarmenu', function () {
    return view('gestionarMenu');
});
Route::get('/gestionarusuarios', function () {
    return view('gestionarusuarios');
});
Route::get('/menuadmin', function () {
    return view('menuAdmin');
});


