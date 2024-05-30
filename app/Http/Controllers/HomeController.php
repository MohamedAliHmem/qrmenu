<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Order;
use App\Models\Produit;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash(){
        $orders[0] = DB::select('SELECT count(id) as somme FROM orders WHERE idCafe = ?',[ Auth::user()->idCafe])[0]->somme;
        $total = DB::select('SELECT total FROM orders WHERE idCafe = ? and payed = ?',[ Auth::user()->idCafe,1]);
        $all=0;
        foreach($total as $t){
            $all += $t->total;
        }
        $orders[1]=$all;
        $orders[3] = DB::select('SELECT * FROM orders WHERE idCafe = ?',[ Auth::user()->idCafe]);
        $orders[3] = array_reverse($orders[3]);
        return view('/dashboard', ['data' => $orders]);
    }

    public function pay($id){
        $find = Order::find($id);
        if($find->payed == 1){
            $find->payed = 0;
        }else{
            $find->payed = 1;
        }
        $find->save();
        return redirect('/dashboard');
    }

    /*public function viewD($id){
        $find = Order::find($id);
        foreach(str_split($find->products) as $product){
            if($product == "/"){

            }
            
        }
        return view('/orderDetails', ['data' => $find], ['data' => $find]);
    }*/
    public function viewD($id) {
        $find = Order::find($id);
        $products = [];
        
        // Split the products string by '/'
        $productList = explode('/', $find->products);
    
        // Iterate through each product in the list
        foreach ($productList as $productInfo) {
            // Split productInfo by ':' to separate product ID and quantity
            $productData = explode(':', $productInfo);
    
            // Retrieve the product details from the database
            $product = Produit::find($productData[0]); // Assuming product ID is at index 0
    
            // If product exists, add it to the products array along with its quantity
            if ($product) {
                $price = Produit::where('idCafe', Auth::user()->idCafe)
                            ->where('id', $productData[0]) // Assuming product ID is at index 0
                            ->value('price');

            $products[] = [
                'name' => $product->name,
                'quantity' => $productData[1], // Quantity is assumed to be at index 1
                'price' => $price, // Assign the retrieved price to the product array
            ];
            }
        }
    
        // Pass the order details and products array to the view
        return view('/orderDetails', ['data' => $find, 'products' => $products]);
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        
        return redirect('/dashboard');
    }*/
}
