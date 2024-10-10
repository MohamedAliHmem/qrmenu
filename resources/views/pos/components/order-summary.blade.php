<!-- resources/views/components/order-summary.blade.php -->
<div class="order-summary">
    <h2>Order Summary</h2>
    <ul>
        @foreach ($orderItems as $item)
            <li>{{ $item['name'] }} x {{ $item['quantity'] }} - {{ number_format($item['total'], 3, ',', ' ') }} DT</li>
        @endforeach
    </ul>
    <p>Total: {{ number_format($total, 3, ',', ' ') }} DT</p>
    <button onclick="proceedToPayment()">Proceed to Payment</button>
</div>
