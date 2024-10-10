<!-- resources/views/pos.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>POS System</title>
    <link href="{{ asset('css/pos.css') }}" rel="stylesheet">
</head>
<body>
    @include('pos.components.header')
    <div class="pos-container">
        <div class="product-section">
            @include('pos.components.product-list', ['products' => $products])
        </div>
        <div class="order-section">
            @include('pos.components.order-summary', ['orderItems' => $orderItems, 'total' => $total])
        </div>
    </div>
    <script>
        let orderItems = @json($orderItems);
        let total = {{ $total }};

        function addToCart(productId) {
            // Add to cart logic
            // Update orderItems and total
        }

        function proceedToPayment() {
            // Proceed to payment logic
        }
    </script>
</body>
</html>
