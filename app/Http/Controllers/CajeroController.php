<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CajeroController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('cajeroCrear', ['products' => $products]);
    }
    public function create(Request $request)
    {
        try {
            $orderItems = $request->input('orderItems');
            $orderTotal = $request->input('orderTotal');
    
            // Crear la orden y los detalles del pedido
            $order = new Order();
            $order->customer_name = 'Customer';
            $order->total_amount = $orderTotal;
            $order->save();
    
            foreach ($orderItems as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['id'];
                $orderDetail->product_name = $item['name'];
                $orderDetail->price = $item['price'];
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->save();
            }
    
            return response()->json(['success' => true]);
    
        } catch (\Exception $e) {
            \Log::error('Error creating order: ' . $e->getMessage());
    
            // Aquí retornamos el mensaje de error para que se muestre en la respuesta
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    


}
