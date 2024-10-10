<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentPage(Request $request)
    {
        $total = $request->query('total', 0);
        return view('payment', ['total' => $total]);
    }

    public function showPOSPage()
{
    $products = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 10.0, 'image' => 'path/to/image1.jpg'],
        ['id' => 2, 'name' => 'Product 2', 'price' => 15.0, 'image' => 'path/to/image2.jpg'],
        // Add more products as needed
    ];
    echo "hello";

    $orderItems = []; // Fetch or initialize order items
    $total = 0.0; // Calculate the total amount

    return view('pos/pos', ['products' => $products, 'orderItems' => $orderItems, 'total' => $total]);
}
}
