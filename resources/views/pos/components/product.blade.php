<!-- resources/views/components/product.blade.php -->
<div class="product">
    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
    <h2>{{ $product['name'] }}</h2>
    <p>{{ number_format($product['price'], 3, ',', ' ') }} DT</p>
    <button onclick="addToCart({{ $product['id'] }})">Add to Cart</button>
</div>
