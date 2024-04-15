

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link href="{{ asset('css/chefs.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Orders</h1>

    <div class="container">
        @foreach($orders as $order)
            <div class="card">
                <h2>Order ID: {{ $order->id }}</h2>
                <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <h3>Details:</h3>
                <ul>
                    @foreach($order->orderDetails as $detail)
                        <li>
                            Product: {{ $detail->product_name }} - 
                            Price: {{ $detail->price }} - 
                            Quantity: {{ $detail->quantity }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</body>
</html>

