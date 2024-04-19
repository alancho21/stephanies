<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <title>Products</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="d-flex justify-content-between">
    <a href='/cajero' class="btn btn-danger ml-auto">Regresar</a>
</div>


<!-- ... -->
<!-- ... -->

<div class="container mt-5">
    <h1 class="mb-4">Available Products</h1>
    <div class="row">
        <!-- Product Cards Section -->
        <div class="col-md-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Description: {{ $product->description }}</p>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <!-- Botón para añadir al Order Summary -->
                                <button class="btn btn-primary add-to-order" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}" data-product-price="{{ $product->price }}">Add to Order</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Summary Section -->
        <div class="col-md-3">
            <h2 class="mb-4">Order Summary</h2>
            
            <!-- Formulario para ingresar el nombre del cliente -->
            <div class="form-group">
                <label for="customer-name">Nombre del Cliente:</label>
                <input type="text" class="form-control" id="customer-name" placeholder="Ingrese el nombre del cliente">
            </div>

            <ul id="order-summary">
                <!-- Order summary items will be displayed here -->
            </ul>
            <p>Total: $<span id="order-total">0</span></p>
            
            <!-- Botón para confirmar el pedido -->
            <button class="btn btn-success" id="confirm-order-btn">Confirm Order</button>
        </div>
    </div>
</div>

<!-- ... -->


<!-- ... -->


    <!-- Incluir Bootstrap JS y Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript para manejar el evento click del botón y añadir productos al Order Summary -->
    <script>
        let orderItems = [];
let orderTotal = 0;

function updateOrderSummary() {
    let orderSummaryHtml = '';
    orderTotal = 0;

    orderItems.forEach(item => {
        orderSummaryHtml += `
            <li>
                ${item.name} - $${item.price} 
                <button class="btn btn-sm btn-success increase-quantity" data-product-id="${item.id}">+</button>
                <span class="quantity">${item.quantity}</span>
                <button class="btn btn-sm btn-danger decrease-quantity" data-product-id="${item.id}">-</button>
            </li>
        `;
        orderTotal += parseFloat(item.price) * item.quantity;
    });

    $('#order-summary').html(orderSummaryHtml);
    $('#order-total').text(orderTotal.toFixed(2));
}
            
        $(document).ready(function() {
            

            $(document).on('click', '.add-to-order', function() {
                const productId = $(this).data('product-id');
                const productName = $(this).data('product-name');
                const productPrice = $(this).data('product-price');

                // Verificar si el producto ya está en el Order Summary
                const existingItem = orderItems.find(item => item.id === productId);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    orderItems.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    });
                }

                // Actualizar la vista del Order Summary
                updateOrderSummary();
            });

            $(document).on('click', '.increase-quantity', function() {
                const productId = $(this).data('product-id');
                const item = orderItems.find(item => item.id === productId);

                if (item) {
                    item.quantity++;
                    updateOrderSummary();
                }
            });

            $(document).on('click', '.decrease-quantity', function() {
                const productId = $(this).data('product-id');
                const item = orderItems.find(item => item.id === productId);

                if (item && item.quantity > 1) {
                    item.quantity--;
                    updateOrderSummary();
                }
            });

            function updateOrderSummary() {
                let orderSummaryHtml = '';
                orderTotal = 0;

                orderItems.forEach(item => {
                    orderSummaryHtml += `
                        <li>
                            ${item.name} - $${item.price} 
                            <button class="btn btn-sm btn-success increase-quantity" data-product-id="${item.id}">+</button>
                            <span class="quantity">${item.quantity}</span>
                            <button class="btn btn-sm btn-danger decrease-quantity" data-product-id="${item.id}">-</button>
                        </li>
                    `;
                    orderTotal += parseFloat(item.price) * item.quantity;
                });

                $('#order-summary').html(orderSummaryHtml);
                $('#order-total').text(orderTotal.toFixed(2));
            }
        });
   

        $(document).on('click', '#confirm-order-btn', function() {
    const customerName = $('#customer-name').val();  // Obtener el nombre del cliente desde el input

    if (orderItems.length === 0) {
        alert('Please add some products to the order.');
        return;
    }

    if (!customerName) {
        alert('Please enter the customer name.');
        return;
    }

    if (confirm('Are you sure you want to place this order?')) {
        // Crear la orden y los detalles del pedido
        $.ajax({
            url: '/create-order',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                orderItems: orderItems,
                orderTotal: orderTotal,
                customerName: customerName  // Incluir el nombre del cliente aquí
            },
            success: function(response) {
                if (response.success) {
                    alert('Order placed successfully!');
                    // Limpiar el Order Summary y reiniciar la lista de productos
                    orderItems = [];
                    console.log('Order items cleared:', orderItems);
                    updateOrderSummary();
                } else {
                    alert('Error placing order: ' + response.message);
                }
            },
        });
    }
});

    </script>
</body>
</html>

