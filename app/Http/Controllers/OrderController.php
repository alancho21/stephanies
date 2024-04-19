<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use app\models\Category;
use Illuminate\Http\Request;
class OrderController extends Controller
{
   // app/Http/Controllers/OrderController.php

   public function index()
{
    $user = auth()->user(); 
    $category = $user->categories()->first(); 
    $categoryId = $category ? $category->id : null;

    $orders = Order::where('status', 'pending')
                   ->whereHas('orderDetails.product', function ($query) use ($categoryId) {
                       $query->where('category_id', $categoryId);
                   })
                   ->with(['orderDetails' => function ($query) use ($categoryId) {
                       $query->whereHas('product', function ($query) use ($categoryId) {
                           $query->where('category_id', $categoryId);
                       });
                   }])
                   ->get();

    return view('chefs', ['orders' => $orders]);
}

   

   public function index2()
   {
       

    $orders = Order::with('orderDetails')
                   ->where('status', 'Pending')
                   ->get();
    return view('cajeroVer', ['orders' => $orders]);
   }

   public function index3()
   {
     
       $salesData = OrderDetail::select('product_id', \DB::raw('SUM(quantity) as total_quantity'))
                               ->groupBy('product_id')
                               ->get();

       $productNames = [];
       foreach ($salesData as $item) {
           $product = Product::find($item->product_id);
           if ($product) {
               $productNames[$product->name] = $item->total_quantity;
           }
       }

       return view('tendencias', compact('productNames'));
   }


   public function updateStatus($id)
   {
       try {
           $order = Order::findOrFail($id);
           $order->status = 'completed';
           $order->save();
       
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
       }
   }
   

}

