<?php

namespace Database\Seeders;

use App\Models\User;
USe App\Models\Category;
USe App\Models\Order;
USe App\Models\OrderDetail;
USe App\Models\Product;
USe App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Crear categorías
        Category::create(['name' => 'Hamburguesas']);
        Category::create(['name' => 'Ensaladas']);
        Category::create(['name' => 'Bebidas']);

        // Crear roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Chef']);
        Role::create(['name' => 'Cajero']);

        // Crear usuarios chefs
        $categories = Category::all();
        foreach ($categories as $category) {
            User::create([
                'name' => $category->name,
                'password' => Hash::make('123'), // Hash de la contraseña
                'role_id' => 2,
            ]);
        }

        // Insertar relaciones en la tabla chefcategories
        $users = User::where('role_id', 2)->get();
        foreach ($users as $user) {
            $categoryId = Category::where('name', $user->name)->first()->id;
            DB::table('chef_categories')->insert([
                'user_id' => $user->id,
                'category_id' => $categoryId,
            ]);
        }

        // Crear usuario admin
        User::create(['name' => 'Admin', 'password' => Hash::make('123'), 'role_id' => 1]);

        // Crear usuario cajero
        User::create(['name' => 'Cajero', 'password' => Hash::make('123'), 'role_id' => 3]);

        // Crear productos y órdenes con detalles
        Product::factory(6)->create();
        Order::factory(50)->create();
        OrderDetail::factory(100)->create();
    }
       
        
    
}

