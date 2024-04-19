<?php

namespace Database\Seeders;

use App\Models\User;
USe App\Models\Category;
USe App\Models\Order;
USe App\Models\OrderDetail;
USe App\Models\Product;
USe App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Category::create(['name' => 'Hamburguesas']);
        Category::create(['name' => 'Ensaladas']);
        Category::create(['name' => 'Bebidas']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Chef']);
        Role::create(['name' => 'Cajero']);
        Product::factory(6)->create();
        Order::factory(10)->create();
        OrderDetail::factory(10)->create();
       
        
    }
}

