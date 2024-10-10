<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $idCafe = Auth::user()->idCafe;
        $categories = Category::where('idCafe', $idCafe)
            ->orderBy('position', 'asc')
            ->get();

        $abonnement = Abonnement::where('idCafe', $idCafe)->first();

        return view('categories.addCategory', compact('categories', 'abonnement'));
    }

    public function store(Request $req)
    {
        $idCafe = Auth::user()->idCafe;

        $abonnement = Abonnement::where('id', Auth::user()->idAbonnement)->first();

        if($abonnement->offre == 'demo'){
            $categoryCount = Category::where('idCafe', $idCafe)->count();
            if ($categoryCount >= 10) {
                return redirect('/addCategory')->with('error', 'Category limit reached for your subscription.');
            }
        }

        $category = new Category;
        $category->idCafe = $idCafe;
        $category->title = $req->CategoryTitle;

        if ($req->newCategoryId == 'first') {
            Category::where('idCafe', $idCafe)
                ->increment('position');

            $category->position = 1;
        } elseif ($req->newCategoryId == 'doNothing') {
            $maxPosition = Category::where('idCafe', $idCafe)
                ->max('position');
            $category->position = $maxPosition + 1;
        } else {
            $selectedCategory = Category::find($req->newCategoryId);
            $category->position = $selectedCategory->position + 1;

            Category::where('idCafe', $idCafe)
                ->where('position', '>', $selectedCategory->position)
                ->increment('position');
        }

        $category->save();
        return redirect('/addCategory')->with('success', 'Category Added Successfully.');
    }

    public function getCategoryId($id) {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $idCafe = $category->idCafe;

        $categories = Category::where('idCafe', $idCafe)
            ->orderBy('position', 'asc')
            ->get();

        return view('categories/modifyCategory', ['data' => $category, 'categories' => $categories]);
    }

    public function updateCategory(Request $req, $id) {

        $category = Category::find($id);
        if (!$category) {
            return redirect('categories/modifyCategory')->with('error', 'category not found');
        }

        $category->title = $req->title;

        $newPositionId = $req->newPositionId;
        if ($newPositionId != 'doNothing') {
            if ($newPositionId == 'first') {
                $this->moveCategoryToTop($category);
            } else {
                $this->moveCategoryAfter($category, $newPositionId);
            }
        }

        $category->update();
        return redirect('tables-product')->with('success', 'Category updated successfully');
    }

    private function moveCategoryToTop($category) {
        $categorys = Category::where('idCafe', $category->idCafe)
            ->orderBy('position', 'asc')
            ->get();

        if($category->position != 1){
            foreach ($categorys as $p) {
                $p->position++;
                $p->update();
            }

            $category->position = 1;
        }

    }

    private function moveCategoryAfter($category, $newPositionId) {
        $newcategory = Category::find($newPositionId);
        if (!$newcategory) {
            return;
        }

        $categorys = Category::where('idCafe', $category->idCafe)
            ->where('position', '>', $newcategory->position)
            ->orderBy('position', 'asc')
            ->get();

        if(!($category->position == $newcategory->position)){
            foreach ($categorys as $p) {
                $p->position++;
                $p->update();
            }

            $category->position = $newcategory->position + 1;
        }

    }

    public function deleteCategory($id) {
        $category = Category::find($id);

        if ($category) {

            $products = Produit::where('idCafe', $category->idCafe)
                ->where('idCategory', $id)
                ->get();

            foreach($products as $product){
                if ($product->logo) {
                    if (!Storage::disk('public')->delete($product->logo)) {
                        return redirect('tables-product')->with('error', 'Failed to delete the image from storage');
                    }
                }

                $product->delete();
            }

            $category->delete();

            return redirect('tables-product')->with('success', 'Category deleted successfully');
        } else {
            return redirect('tables-product')->with('error', 'Category not found');
        }
    }


}

/*public function deleteCategory($id) {
    $category = Category::find($id);

    if ($category) {



        Produit::where('idCategory', $id)
            ->where('idCafe', $category->idCafe)
            ->delete();

        $category->delete();

        return redirect('tables-product')->with('success', 'Category deleted successfully');
    } else {
        return redirect('tables-product')->with('error', 'Category not found');
    }
}*/
