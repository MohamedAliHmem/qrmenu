<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Abonnement;
use App\Models\Category;

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
        $orders[3] = DB::table('orders')
            ->where('idCafe', Auth::user()->idCafe)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $orders[4] = Abonnement::where('idCafe', Auth::user()->idCafe)->first();

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

    public function viewD($id) {
        $find = Order::find($id);

        $products = [];

        $productList = explode('/', $find->products);

        foreach ($productList as $productInfo) {
            $productData = explode(':', $productInfo);

            $product = Produit::find($productData[0]);
            $categoryTitle = null;

            if ($product) {
                $price = Produit::where('idCafe', Auth::user()->idCafe)
                            ->where('id', $productData[0])
                            ->value('price');

                if ($product->idCategory != 0) {
                    $category = Category::where('id', $product->idCategory)->where('idCafe', $product->idCafe)->first();
                    if ($category) {
                        $categoryTitle = $category->title;
                    }
                }

                $products[] = [
                    'name' => $product->name,
                    'quantity' => $productData[1],
                    'price' => $price,
                    'category_title' => $categoryTitle
                ];
            }
        }

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
