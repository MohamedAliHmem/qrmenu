<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProduitController extends Controller
{
    public function getProduct(){
        $product = Produit::where('idCafe', Auth::user()->idCafe)
        ->get();
        
        return view('tables-product', ['data' => $product]);
    }

    public function getProductUser($table){
        $product = Produit::where('idCafe', Auth::user()->idCafe)
        ->get();
        
        if(isset($table)){
            return view('WebSite/shop', ['data' => $product, 'numTable' => $table]);
        }
        return view('WebSite/shop', ['data' => $product]);
    }

    public function infoProduct($numTable,$id){
        $product = Produit::where('idCafe', Auth::user()->idCafe)
        ->where('id', $id)
        ->get();
        
        return view('WebSite/product', ['data' => $product, 'numTable' => $numTable]);
    }

    public function ajoutProduit(Request $req){
        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2000048',
        ]);
        $product = new Produit;
        $product->idCafe = Auth::user()->idCafe;
        $product->price = $req->price;
        $product->name = $req->name;
        if ($req->hasFile('logo')) {
            $product->logo = $req->file('logo')->store('images','public');
        }   
        //dd($client);
        $product->save();
        return redirect('/addProduct')->with('alert', 'Product Added Successfully.');
    }

    public function deleteProduct($id){
        $find = Produit::find($id);
        $find->delete();
        return redirect('tables-product');
    }

    public function getProductId($id){
        $find = Produit::find($id);
        return view('/modifier-product', ['data' => $find]);
    }

    public function updateProduct(Request $req,$id){
        $cafe = Produit::find($id);
        
        $cafe->name = $req->name;
        $cafe->price = $req->price;
        $cafe->logo = $req->logo;
           
        $cafe->update();
        return redirect('tables-product');
    }
}
