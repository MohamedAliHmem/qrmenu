<?php

namespace App\Http\Controllers;
use App\Events\UserRegistration;
use Auth;
use App\Models\Produit;
use App\Models\Order;
use Attribute;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addOrder(){
        $order = Produit::where('idCafe', Auth::user()->idCafe)
        ->get();
        return view('addOrder', ['data' => $order]);
    }

    /*public function addO(Request $req){
        $product = new Order;
        $product->idCafe = Auth::user()->idCafe;
        $product->numTable= $req->numTable;
        if($req->payed=='yes'){
            $product->payed = true;
        }else{
            $product->payed = false;
        }
        $total = 0;
        foreach($req->products as $item){
            $p = Produit::where('idCafe',Auth::user()->idCafe)
            ->where('id', $item)
            ->first();
            if ($p) {
                $total =$total + $p->price;
                $product->products = $product->products.$item.'/';
            }
        }
        $product->total = $total ;

        $product->save();
        return redirect('/addOrder')->with('alert', 'Order Added Successfully.');
    }*/
    public function addO(Request $req) {
        $order = new Order;
        $order->idCafe = Auth::user()->idCafe;
        $order->numTable = $req->numTable;

        $order->payed = ($req->payed == 'yes') ? true : false;

        $total = 0;
        if (!is_null($req->products) && is_array($req->products)) {
            foreach ($req->products as $index => $product_id) {
                $product = Produit::where('idCafe', Auth::user()->idCafe)
                            ->where('id', $product_id)
                            ->first();

                if ($product) {
                    if (isset($req->quantities[$index])) {
                        $total += $product->price * $req->quantities[$index];

                        $order->products .= $product_id . ':' . $req->quantities[$index] . '/';
                    }
                }
            }
        }
        $order->total = $total;
        $order->save();
        return redirect('/addOrder')->with('alert', 'Order Added Successfully.');
    }

    public function buyNow(Request $req,$numTable,$id){
        $name = $numTable;
        //event(new UserRegistration($name));
        $product = Produit::find($id);

        $order = new Order;
        $order->idCafe = $product->idCafe;
        $order->numTable = $numTable;

        $order->payed = false;
        $order->products = $id . ':' . $req->quantity . '/';
        $order->total = $product->price * $req->quantity;
        $order->save();
        return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Product Bought Successfully.');
    }

    public function AddTC(Request $req,$numTable,$id,$idCafe){
        if (session()->has('order')) {
            $order = session('order');
            session()->put('order', $order.$id."*".$req->quantity."/");
        } else {
            session()->put('order', $id."*".$req->quantity."/");
        }/*
        $dictionnaire = array();
        $orderNonSeparated = session('order');
        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        foreach($orderSeparated as $orders){
            $sep = array_filter(explode('*', $orders));
            $dictionnaire[$sep[0]] = $sep[1];
        }*/
        //dd($order);

        return redirect("/shop/$numTable/$idCafe");
    }

    public function DeleteTC($id, $quantity,$numTable,$idCafe){
        $orderNonSeparated = session('order');
        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        foreach($orderSeparated as $order){
            $orderSeparatedByEtoile = array_filter(explode('*', $order));
            if ($orderSeparatedByEtoile[0] == $id and $orderSeparatedByEtoile[1] == $quantity){
                $string = $orderNonSeparated;
                $pattern = preg_quote($order, '/') . '\/';
                $replacement = '';
                $limit = 1;

                $cleanString = preg_replace("/$pattern/", $replacement, $string, $limit);
                break;
            }
        }
        session()->put('order', $cleanString);
        return redirect("/shop/$numTable/$idCafe");
    }

    public function CheckoutNow($numTable){

        $order = new Order;
        $orderNonSeparated = session('order');
        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        foreach($orderSeparated as $o){
            $product = Produit::find($o[0]);

            $order->idCafe = $product->idCafe;
            $order->numTable = $numTable;

            $order->payed = false;
            $order->products = $order->products . $o[0] . ':' . $o[2] . '/';
            $order->total = $order->total + $product->price * $o[2];
        }
        $order->save();
        session()->forget('order');
        return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Product Bought Successfully.');
    }

    public function deleteO($id){
        $search = Order::find($id);

        $search->delete();

        return redirect('/dashboard')->with('alert', 'Order Deleted Successfully.');
    }

}
