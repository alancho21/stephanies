<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link href="{{ asset('css/chefs.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col">
            <h1>Orders</h1>
        </div>
        <div class="col text-right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                        <p class="card-text"><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Details:</h6>
                        <ul class="list-unstyled">
                            @foreach($order->orderDetails as $detail)
                                <li>
                                    Product: {{ $detail->product_name }} - Quantity: {{ $detail->quantity }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
