<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   // app/Http/Controllers/OrderController.php

   
   public function index()
   {
       $categoryId = 1; // ID de la categoría deseada

       $orders = Order::whereHas('orderDetails.product', function ($query) use ($categoryId) {
           $query->where('category_id', $categoryId);
       })->with(['orderDetails' => function ($query) use ($categoryId) {
           $query->whereHas('product', function ($query) use ($categoryId) {
               $query->where('category_id', $categoryId);
           });
       }])->get();

       return view('Chefs', ['orders' => $orders]);
   }
}

