<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        $categories = Category::all();  
        return view('gestionarUsuarios', compact('users', 'roles', 'categories'));  
    }
    
    

    public function create()
{
    $roles = Role::all();
    $categories = Category::all();
    return view('gestionarUsuarios.create', compact('roles', 'categories'));
}


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'password' => 'required',
        'role_id' => 'required|exists:roles,id',
        'category_id' => 'nullable|exists:categories,id',
        
    ]);
    

    $user = new User([
        'name' => $request->get('name'),
        'password' => Hash::make($request->get('password')),
        'role_id' => $request->get('role_id'),
    ]);

    $user->save();

    if ($request->get('role_id') == 2 && $request->has('category_id')) {
        $user->categories()->attach($request->get('category_id'));
    }

    return redirect()->route('gestionarUsuarios.index')->with('success', 'Usuario agregado exitosamente');


}

public function edit($id)
{
    $user = User::with('categories')->findOrFail($id);
    $roles = Role::all();
    $categories = Category::all();
    return view('editarUsuarios', compact('user', 'roles', 'categories'));
}



    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'password' => 'required',
        'role_id' => 'required|exists:roles,id',
        'category_id' => 'nullable|exists:categories,id',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->get('name');
    $user->password = Hash::make($request->get('password'));
    $user->role_id = $request->get('role_id');
    $user->save();

    if ($request->get('role_id') == 2 && $request->has('category_id')) {
        $user->categories()->sync([$request->get('category_id')]);
    } else {
        $user->categories()->detach();
    }

    return redirect()->route('gestionarUsuarios.index')->with('success', 'Usuario actualizado exitosamente');

}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('gestionarUsuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
