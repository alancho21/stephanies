<?php

namespace Database\Seeders;

use App\Models\User;
USe App\Models\Category;
USe App\Models\Order;
USe App\Models\OrderDetail;
USe App\Models\Product;
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

        Category::factory(3)->create();
        Product::factory(50)->create();
        Order::factory(10)->create();
        OrderDetail::factory(10)->create();
       
        
    }
}

