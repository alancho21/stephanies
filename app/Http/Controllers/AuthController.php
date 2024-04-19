<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Guardar el ID del usuario en la sesión
            $request->session()->put('user_id', Auth::id());

            // Obtener el role ID del usuario autenticado
            $role_id = Auth::user()->role_id;

            // Redirigir según el role ID
            switch ($role_id) {
                case 1:
                    return redirect()->intended('/admin/dashboard');
                    break;
                case 2:
                    return redirect()->intended('/user/dashboard');
                    break;
                default:
                    return redirect()->intended('/dashboard');
                    break;
            }
        }

        return back()->withErrors([
            'message' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }
}
