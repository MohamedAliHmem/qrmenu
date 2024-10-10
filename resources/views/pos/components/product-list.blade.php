<!-- resources/views/components/product-list.blade.php -->
<div class="product-list">
    @foreach ($products as $product)
        @include('components.product', ['product' => $product])
    @endforeach
</div>
