<?php

namespace App\Http\Controllers;
use App\Events\UserRegistration;
use Auth;
use App\Models\Produit;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Attribute;
use Illuminate\Http\Request;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendOrderShippedEmail;

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
        return redirect('/addOrder')->with('alert', 'Commande Envoyée Avec Succès.');
    }

    public function buyNow(Request $req, $numTable, $id)
    {
        $product = Produit::find($id);
        if (!$product) {
            return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Produit non trouvé.');
        }

        $emails = User::where('idCafe', $product->idCafe)->first(['email', 'secondEmail']);
        $email = $emails->email;
        $email2 = $emails->secondEmail;

        $categoryTitle = null;
        if ($product->idCategory != 0) {
            $category = Category::where('id', $product->idCategory)->where('idCafe', $product->idCafe)->first();
            if ($category) {
                $categoryTitle = $category->title;
            }
        }

        $order = new Order;
        $order->idCafe = $product->idCafe;
        $order->numTable = $numTable;
        $order->remarque = $req->remarque ?? null;
        $order->payed = false;
        $order->products = $id . ':' . $req->quantity . '/';
        $order->total = $product->price * $req->quantity;
        $order->save();

        $orderDetails = [
            'products' => [
                [
                    'product_name' => $product->name,
                    'product_quantity' => $req->quantity,
                    'product_price' => $product->price,
                    'category_title' => $categoryTitle,
                    'total_price' => $order->total
                ]
            ],
            'total_price' => $order->total,
            'table_number' => $numTable,
            'remarque' => $req->remarque
        ];

        Mail::send(new OrderShipped($orderDetails, $email, $email2));
        //SendOrderShippedEmail::dispatch($orderDetails, $email, $email2);
        return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Produit Acheté Avec Succès.');
    }

    public function AddTC(Request $req,$numTable,$id,$idCafe){
        if (session()->has('order')) {
            $order = session('order');
            session()->put('order', $order.$id.":".$req->quantity."/");
        } else {
            session()->put('order', $id.":".$req->quantity."/");
        }

        return redirect("/shop/$numTable/$idCafe")->with('card', 'Produit Ajouté.');
    }

    public function DeleteTC($id, $quantity,$numTable,$idCafe){
        $orderNonSeparated = session('order');
        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        foreach($orderSeparated as $order){
            $orderSeparatedByEtoile = array_filter(explode(':', $order));
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

    public function CheckoutNow(Request $req, $numTable)
    {
        $orderNonSeparated = session('order');
        if (!$orderNonSeparated) {
            return redirect("/shop/$numTable")->with('alert', 'Aucune commande trouvée dans la session.');
        }

        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        if (empty($orderSeparated)) {
            return redirect("/shop/$numTable")->with('alert', 'Aucune commande valide trouvée.');
        }

        $products_list = [];
        $total = 0;
        $idCafe = null;

        foreach ($orderSeparated as $o) {
            $parts = explode(':', $o);
            $product = Produit::find($parts[0]);

            if (!$product) {
                continue; // Ignore les produits inexistants
            }

            $categoryTitle = null;
            if ($product->idCategory != 0) {
                $category = Category::where('id', $product->idCategory)->where('idCafe', $product->idCafe)->first();
                if ($category) {
                    $categoryTitle = $category->title;
                }
            }

            if (!$idCafe) {
                $idCafe = $product->idCafe;
            }

            $quantity = (float)$parts[1];
            $price = (float)$product->price;
            $totalPrice = $price * $quantity;
            $total += $totalPrice;

            $products_list[] = [
                'product_name' => $product->name,
                'product_quantity' => $quantity,
                'product_price' => $price,
                'category_title' => $categoryTitle,
                'total_price' => $totalPrice
            ];
        }

        if (!$idCafe) {
            return redirect("/shop/$numTable")->with('alert', 'Aucun produit valide trouvé dans la commande.');
        }

        $order = new Order;
        $order->idCafe = $idCafe;
        $order->numTable = $numTable;
        $order->remarque = $req->remarque ?? null;
        $order->payed = false;
        $order->products = $orderNonSeparated;
        $order->total = $total;
        $order->save();

        $emails = User::where('idCafe', $idCafe)->first(['email', 'secondEmail']);
        $email = $emails->email;
        $email2 = $emails->secondEmail;

        $orderDetails = [
            'products' => $products_list,
            'total_price' => $order->total,
            'table_number' => $numTable,
            'remarque' => $req->remarque
        ];

        session()->forget('order');

        Mail::send(new OrderShipped($orderDetails, $email, $email2));
        //SendOrderShippedEmail::dispatch($orderDetails, $email, $email2);
        return redirect("/shop/$numTable/$idCafe")->with('alert', 'Produit Acheté Avec Succès.');
    }

    public function deleteO($id){
        $search = Order::find($id);

        $search->delete();

        return redirect('/dashboard')->with('alert', 'Commande Supprimée Avec Succès.');
    }

}

/*
public function CheckoutNow(Request $req, $numTable){
        $order = new Order;
        $orderNonSeparated = session('order');
        $orderSeparated = array_filter(explode('/', $orderNonSeparated));
        $products_list = [];
        foreach($orderSeparated as $o){
            $parts = explode('*', $o);
            $product = Produit::find($parts[0]);

            if($product->idCategory != 0){
                $category = Category::where('id', $product->idCategory)->where('idCafe', $product->idCafe)->first();
                if ($category) {
                    $categoryTitle = $category->title;
                }
            }else{
                $categoryTitle = null ;
            }

            $order->idCafe = $product->idCafe;
            $order->numTable = $numTable;

            $order->payed = false;

            if($req->remarque){
                $order->remarque = $req->remarque;
            }else{
                $order->remarque = null;
            }


            $order->products = $order->products . $parts[0] . ':' . $parts[1] . '/';
            $order->total = $order->total + (float)$product->price * (float)$parts[1];

            if($categoryTitle){
                $products_list[] =
                [
                    'product_name' => $product->name,
                    'product_quantity' => $parts[1],
                    'product_price' => $product->price,
                    'category_title' => $categoryTitle,
                    'total_price' => (float)$product->price * (float)$parts[1]
                ];
            }else{
                $products_list[] =
                [
                    'product_name' => $product->name,
                    'product_quantity' => $parts[1],
                    'product_price' => $product->price,
                    'category_title' => null,
                    'total_price' => (float)$product->price * (float)$parts[1]
                ];
            }

        }

        $order->save();

        $email = User::where('idCafe', $product->idCafe)->value('email');
        $email2 = User::where('idCafe', $product->idCafe)->value('secondEmail');

        $orderDetails = [
            'products' => $products_list,
            'total_price' => $order->total,
            'table_number' => $numTable,
            'remarque' => $req->remarque
        ];
        session()->forget('order');

        if($email2){
            Mail::send(new OrderShipped($orderDetails,$email,$email2));
        }else{
            Mail::send(new OrderShipped($orderDetails,$email,null));
        }

        return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Produit Acheté Avec Succès.');
    }
*/
/*
public function buyNow(Request $req,$numTable,$id){
    //$name = $numTable;
    //event(new UserRegistration($name));
    $product = Produit::find($id);
    $email = User::where('idCafe', $product->idCafe)->value('email');
    $email2 = User::where('idCafe', $product->idCafe)->value('secondEmail');

    if($product->idCategory != 0){
        $category = Category::where('id', $product->idCategory)->where('idCafe', $product->idCafe)->first();
        if ($category) {
            $categoryTitle = $category->title;
        }
    }else{
        $categoryTitle = null ;
    }

    $order = new Order;
    $order->idCafe = $product->idCafe;
    $order->numTable = $numTable;

    if($req->remarque){
        $order->remarque = $req->remarque;
    }else{
        $order->remarque = null;
    }


    $order->payed = false;
    $order->products = $id . ':' . $req->quantity . '/';
    $order->total = $product->price * $req->quantity;
    $order->save();

    // email

    if($categoryTitle){
        $orderDetails = [
            'products' => [
                [
                    'product_name' => $product->name,
                    'product_quantity' => $req->quantity,
                    'product_price' => $product->price,
                    'category_title' => $categoryTitle,
                    'total_price' => $order->total
                ]
            ],
            'total_price' => $order->total,
            'table_number' => $numTable,
            'remarque' => $req->remarque
        ];
    }else{
        $orderDetails = [
            'products' => [
                [
                    'product_name' => $product->name,
                    'product_quantity' => $req->quantity,
                    'product_price' => $product->price,
                    'category_title' => null,
                    'total_price' => $order->total
                ]
            ],
            'total_price' => $order->total,
            'table_number' => $numTable,
            'remarque' => $req->remarque
        ];
    }
    if($email2){
        Mail::send(new OrderShipped($orderDetails,$email,$email2));

    }else{
        Mail::send(new OrderShipped($orderDetails,$email,null));
        //SendOrderShippedEmail::dispatch($orderDetails, $email, null);
    }

    return redirect("/shop/$numTable/$product->idCafe")->with('alert', 'Produit Acheté Avec Succès.');
}
*/
