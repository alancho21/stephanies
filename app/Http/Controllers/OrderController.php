<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Role;
use app\models\Category;
use Illuminate\Http\Request;
class OrderController extends Controller
{
   // app/Http/Controllers/OrderController.php

   public function index()
   {
    $user = auth()->user(); // Obtener el usuario autenticado
    $category = $user->categories()->first(); // Suponiendo que un usuario tiene solo una categoría asignada
    $categoryId = $category ? $category->id : null;
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

