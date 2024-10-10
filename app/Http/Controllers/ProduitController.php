<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;
use App\Models\Abonnement;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function getProduct(){
        $idCafe = Auth::user()->idCafe;

        // Retrieve all products and categories
        $products = Produit::where('idCafe', $idCafe)
            ->orderBy('position', 'asc')
            ->get();

        $categories = Category::where('idCafe', $idCafe)
            ->orderBy('position', 'asc')
            ->get();

        // Initialize the array to store products by category
        $productsByCategory = [];

        // Loop through each category and retrieve the products
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Produit::where('idCafe', $idCafe)
                ->where('idCategory', $category->id) // Assuming your product has a category_id field
                ->orderBy('position', 'asc')
                ->get();
        }

        // Add products without a category to the array under a special key
        $productsByCategory['no_category'] = Produit::where('idCafe', $idCafe)
            ->where('idCategory', 0) // Assuming products without a category have a null idCategory
            ->orderBy('position', 'asc')
            ->get();

        return view('tables-product', [
            'categories' => $categories,
            'productsByCategory' => $productsByCategory,
        ]);
    }


    /*public function getProduct(){
        $product = Produit::where('idCafe', Auth::user()->idCafe)
        ->get();

        return view('tables-product', ['data' => $product]);
    }*/

    public function getProductUser($table, $idCafe) {
        $abonnement = Abonnement::where('idCafe', $idCafe)->first();

        if($abonnement->offre == 'demo' || $abonnement->paiement == 1){
            $categories = Category::where('idCafe', $idCafe)
                ->orderBy('position', 'asc')
                ->get();

            $productsByCategory = [];

            foreach ($categories as $category) {
                $productsByCategory[$category->id] = Produit::where('idCafe', $idCafe)
                    ->where('idCategory', $category->id)
                    ->orderBy('position', 'asc')
                    ->get();
            }

            $productsByCategory['no_category'] = Produit::where('idCafe', $idCafe)
                ->where('idCategory', 0)
                ->orderBy('position', 'asc')
                ->get();

            if($abonnement->offre == 'basique'){
                $sendOrders = false;
            }else{
                $sendOrders = true;
            }

            $viewData = [
                'categories' => $categories,
                'productsByCategory' => $productsByCategory,
                'sendOrders' => $sendOrders
            ];

            if (isset($table)) {
                $viewData['numTable'] = $table;
            }

            return view('WebSite/shop', $viewData);
        }else{
            return view('WebSite.404');
        }

    }



    /*public function getProductUser($table,$idCafe){
        $product = Produit::where('idCafe', $idCafe)
        ->get();

        if(isset($table)){
            return view('WebSite/shop', ['data' => $product, 'numTable' => $table]);
        }
        return view('WebSite/shop', ['data' => $product]);
    }*/

    public function infoProduct($numTable,$id,$idCafe){
        $products = Produit::where('idCafe', $idCafe)
        ->where('id', $id)
        ->get();

        $product = $products->first();

        if($product){
            $category = Category::where('id', $product->idCategory)
            ->first();

            return view('WebSite/product', ['data' => $products, 'category' => $category, 'numTable' => $numTable]);
        }else{
            return redirect()->back()->with('alert', 'Produit non disponible.');
        }
    }

    public function ajoutProduit(Request $req){
        $abonnement = Abonnement::where('id', Auth::user()->idAbonnement)->first();

        if($abonnement->offre == 'demo'){
            $productCount = Produit::where('idCafe', Auth::user()->idCafe)->count();
            if ($productCount >= 30) {
                return redirect('/addProduct')->with('error', 'Product limit reached for your subscription.');
            }
        }

        $req->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        $product = new Produit;
        $product->idCafe = Auth::user()->idCafe;
        $product->price = $req->price;
        $product->name = $req->name;
        $product->note = $req->note;

        if ($req->Category) {
            $product->idCategory = $req->Category;
        } else {
            $product->idCategory = 0;
        }

        $maxPosition = Produit::where('idCafe', $product->idCafe)
            ->where('idCategory', $product->idCategory)
            ->max('position');

        if ($maxPosition) {
            $product->position = $maxPosition + 1;
        } else {
            $product->position = 1;
        }

        if ($req->hasFile('logo')) {
            $product->logo = $req->file('logo')->store('images','public');
        }

        $product->save();
        return redirect('/addProduct')->with('alert', 'Product Added Successfully.');


    }

    /*public function ajoutProduit(Request $req){
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
        $product->save();
        return redirect('/addProduct')->with('alert', 'Product Added Successfully.');
    }*/

    public function deleteProduct($id) {
        $product = Produit::find($id);

        if ($product) {

            if ($product->logo) {
                if (!Storage::disk('public')->delete($product->logo)) {
                    return redirect('tables-product')->with('error', 'Failed to delete the image from storage');
                }
            }

            $product->delete();

            return redirect('tables-product')->with('success', 'Product deleted successfully');
        } else {
            return redirect('tables-product')->with('error', 'Product not found');
        }
    }


    public function deleteProductImage($id){
        $product = Produit::find($id);
        if($product){
            if($product->logo){
                if(Storage::disk('public')->delete($product->logo)){
                    $product->logo = null ;
                    $product->save();
                    return redirect('tables-product')->with('alert', 'Product image deleted successfully');
                }else {
                    return redirect('tables-product')->with('error', 'Failed to delete the image from storage');
                }
            }else {
                return redirect('tables-product')->with('error', 'No image found for this product');
            }
        }else {
            return redirect('tables-product')->with('error', 'Product not found');
        }


    }

    public function getProductId($id){
        $product = Produit::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $idCafe = $product->idCafe;
        $idCategory = $product->idCategory;

        $products = Produit::where('idCafe', $idCafe)
            ->where('idCategory', $idCategory)
            ->orderBy('position', 'asc')
            ->get();

        return view('/modifier-product', ['data' => $product, 'products' => $products]);
    }

    public function updateProduct(Request $req, $id) {
        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        $product = Produit::find($id);
        if (!$product) {
            return redirect('tables-product')->with('error', 'Product not found');
        }

        $product->name = $req->name;
        $product->price = $req->price;
        $product->note = $req->note;

        if ($req->has('change_logo') && $req->hasFile('logo')) {
            $product->logo = $req->file('logo')->store('images', 'public');
        }

        if ($req->has('change-category-position')) {
            $newProductId = $req->newProductId;
            if ($newProductId != 'doNothing') {
                if ($newProductId == 'first') {
                    $this->moveProductToTop($product);
                } else {
                    $this->moveProductAfter($product, $newProductId);
                }
            }
        }

        $product->update();
        return redirect('tables-product')->with('success', 'Product updated successfully');
    }

    private function moveProductToTop($product) {
        $products = Produit::where('idCafe', $product->idCafe)
            ->where('idCategory', $product->idCategory)
            ->orderBy('position', 'asc')
            ->get();

        foreach ($products as $p) {
            $p->position++;
            $p->update();
        }

        $product->position = 1;
    }

    private function moveProductAfter($product, $newProductId) {
        $newProduct = Produit::find($newProductId);
        if (!$newProduct) {
            return;
        }

        $products = Produit::where('idCafe', $product->idCafe)
            ->where('idCategory', $product->idCategory)
            ->where('position', '>', $newProduct->position)
            ->orderBy('position', 'asc')
            ->get();

        if(!($product->position == $newProduct->position)){
            foreach ($products as $p) {
                $p->position++;
                $p->update();
            }

            $product->position = $newProduct->position + 1;
        }

    }

    /*private function moveProductAfter($product, $newProductId) {
        $newProduct = Produit::find($newProductId);
        if (!$newProduct) {
            return;
        }

        $products = Produit::where('idCafe', $product->idCafe)
            ->where('idCategory', $product->idCategory)
            ->where('position', '>', $newProduct->position)
            ->orderBy('position', 'asc')
            ->get();

        //if(!($product->position == $newProduct->position or $product->position == $products[0]->position))
        foreach ($products as $p) {
            $p->position++;
            $p->update();
        }

        $product->position = $newProduct->position + 1;
    }*/



    /*public function getProductId($id){
        $find = Produit::find($id);
        return view('/modifier-product', ['data' => $find]);
    }*/

    /*public function updateProduct(Request $req,$id){
        $req->validate([
                    'logo' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);
        $cafe = Produit::find($id);
        if(!$req->has('change-category-position')){
            $cafe->name = $req->name;
            $cafe->price = $req->price;

            if ($req->hasFile('logo')) {
                $cafe->logo = $req->file('logo')->store('images','public');
            }
            $cafe->update();
            return redirect('tables-product');

        }else{
            if($req->newProductId == 'doNothing'){

                $cafe->name = $req->name;
                $cafe->price = $req->price;

                if ($req->hasFile('logo')) {
                    $cafe->logo = $req->file('logo')->store('images','public');
                }
                $cafe->update();
                return redirect('tables-product');
            }else{
                $lastProduct = Produit::where('idCafe', Auth::user()->idCafe)
                        ->where('idCategory', $cafe->idCategory)
                        ->where('position', '<', $cafe->position)
                        ->orderBy('position', 'asc')
                        ->get()
                        ->last();
                if($req->newProductId == $cafe->id or $req->newProductId == $lastProduct->id){
                    $cafe->name = $req->name;
                    $cafe->price = $req->price;

                    if ($req->hasFile('logo')) {
                        $cafe->logo = $req->file('logo')->store('images','public');
                    }
                    $cafe->update();
                    return redirect('tables-product');
                }else{
                    $newProduct = Produit::find($req->newProductId);


                    if($newProduct->position < $cafe->position){
                        $cafe->name = $req->name;
                        $cafe->price = $req->price;

                        if ($req->hasFile('logo')) {
                            $cafe->logo = $req->file('logo')->store('images','public');
                        }

                        $firstProduct = Produit::where('idCafe', Auth::user()->idCafe)
                        ->where('idCategory', $cafe->idCategory)
                        ->where('position', '<', $cafe->position)
                        ->where('position', '>', $newProduct->position)
                        ->orderBy('position', 'asc')
                        ->get()
                        ->first();

                        $products = Produit::where('idCafe', Auth::user()->idCafe)
                            ->where('idCategory', $cafe->idCategory)
                            ->where('position', '<', $cafe->position)
                            ->where('position', '>', $newProduct->position)
                            ->orderBy('position', 'asc')
                            ->get();

                        $newPosition = $products[0]->position ;

                        foreach($products as $product){
                            $np = Produit::where('idCafe', Auth::user()->idCafe)
                                ->where('idCategory', $cafe->idCategory)
                                ->where('position', '<=', $cafe->position)
                                ->where('position', '>', $product->position)
                                ->orderBy('position', 'asc')
                                ->get()
                                ->first();

                            $product->position = $np->position;
                            $product->update();
                        }

                        $cafe->position = $newPosition ;

                        $cafe->update();
                        return redirect('tables-product');
                    }else{

                    }

                }
            }
        }

    }*/

    /*public function updateProduct(Request $req,$id){
        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2000048',
        ]);
        $cafe = Produit::find($id);

        $cafe->name = $req->name;
        $cafe->price = $req->price;
        //$cafe->logo = $req->logo;

        if ($req->hasFile('logo')) {
            $cafe->logo = $req->file('logo')->store('images','public');
        }
        $cafe->update();
        return redirect('tables-product');
    }*/

    public function addProductView(){
        $idCafe = Auth::user()->idCafe;

        $categories = Category::where('idCafe', $idCafe)
        ->orderBy('position', 'asc')
        ->pluck('title', 'id');

        $abonnement = Abonnement::where('idCafe', $idCafe)->first();

        return view('addProduct', ['categories' => $categories, 'abonnement' => $abonnement]);
    }
}


/*private function moveProductAfter($product, $newProductId) {
        $newProduct = Produit::find($newProductId);
        if (!$newProduct) {
            return;
        }

        $products = Produit::where('idCafe', $product->idCafe)
            ->where('idCategory', $product->idCategory)
            ->where('position', '>', $newProduct->position)
            ->orderBy('position', 'asc')
            ->get();

        //if(!($product->position == $newProduct->position or $product->position == $products[0]->position))
        foreach ($products as $p) {
            $p->position++;
            $p->update();
        }

        $product->position = $newProduct->position + 1;
    }*/

    /*public function deleteProduct($id) {
        $product = Produit::find($id);

        if ($product) {
            $idCafe = $product->idCafe;
            $idCategory = $product->idCategory;
            $position = $product->position;

            if ($product->logo) {
                if (!Storage::disk('public')->delete($product->logo)) {
                    return redirect('tables-product')->with('error', 'Failed to delete the image from storage');
                }
            }

            $product->delete();

            $remainingProducts = Produit::where('idCafe', $idCafe)
                ->where('idCategory', $idCategory)
                ->where('position', '>', $position)
                ->orderBy('position', 'asc')
                ->get();

            foreach ($remainingProducts as $remainingProduct) {
                $remainingProduct->position -= 1;
                $remainingProduct->save();
            }

            return redirect('tables-product')->with('success', 'Product deleted successfully');
        } else {
            return redirect('tables-product')->with('error', 'Product not found');
        }
    }*/
