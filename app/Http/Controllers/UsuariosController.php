<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuarios::paginate(2);
        $data = [
            'Usuarios'=>$usuarios,
        ];
        return view('Usuarios.index',$data);
    }

    
    public function create()
    {
        return view('Usuarios.create');
    }

    public function store(Request $request)
    {
        $usuario =  new Usuarios();
        $usuario->nombre = $request->nombre;
        $usuario->contraseña = $request->contraseña;
        $usuario->save();
        return redirect()->route('Usuarios.index');
    }

    
    public function show(string $id)
    {
        $usuario = Usuarios::find($id);
        $data = [
            'Usuarios'=>$usuario,
        ];
        return view('Usuarios.show',$data);
    }

    
    public function edit(string $id)
    {
        $usuario = Usuarios::find($id);
        $data = [
            'Usuarios'=>$usuario,
        ];
        return view('Usuarios.edit',$data);
    }

    
    public function update(Request $request, string $id)
    {
        $usuario = Usuarios::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->contraseña = $request->contraseña;
        $usuario->save();
        return redirect()->route('Usuarios.index');
    }

   
    public function destroy(string $id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return redirect()->route('Usuarios.index');
    }
}
