<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   // app/Http/Controllers/OrderController.php

   
   public function index()
{
    $user = auth()->user(); // Obtener el usuario autenticado
    $categoryId = $user->category_id; // Obtener el category_id del usuario autenticado

    $orders = Order::whereHas('orderDetails.product', function ($query) use ($categoryId) {
        $query->where('category_id', $categoryId);
    })->with(['orderDetails' => function ($query) use ($categoryId) {
        $query->whereHas('product', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }])->get();

    return view('chefs', ['orders' => $orders]);
}

   public function index2()
   {
       

    $orders = Order::with('orderDetails')
                   ->where('status', 'Pending')
                   ->get();
    return view('cajeroVer', ['orders' => $orders]);
   }
}

