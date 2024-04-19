<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ... tus otros métodos

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('name', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            switch ($user->role_id) {
                case 1:
                    return redirect()->intended('/manuAdmin');
                    break;
                case 2:
                    return redirect()->intended('/chefs');
                    break;
                case 3:
                    return redierct()->intended('/cajero');
                    break;
                default:
                    return redirect()->intended('/home');
                    break;
            }
        }
    
        return back()->withErrors([
            'name' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
    
}
