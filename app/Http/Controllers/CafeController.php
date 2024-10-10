<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\User;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Category;
use App\Models\Abonnement;
use Auth;
use Illuminate\Support\Facades\DB;
class CafeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCafe(){
        $search = DB::select('SELECT idCafe,name,adresse,telephone,email,secondEmail FROM users WHERE idCafe = ? limit 1',[Auth::user()->idCafe]);
        return view('tables-cafe',['data'=> $search]);

    }

    public function deleteCafe($id){
        $search = DB::select('SELECT id as idSupp FROM users WHERE idCafe = ?',[$id])[0]->idSupp;
        $user = User::find($search);

        Order::where('idCafe', $user->idCafe)->delete();

        Produit::where('idCafe', $user->idCafe)->delete();

        Category::where('idCafe', $user->idCafe)->delete();

        Abonnement::where('idCafe', $user->idCafe)->delete();

        $user->delete();
        return redirect('/');
    }



    public function getCafeId($id){
        $search = DB::select('SELECT id as idSupp FROM users WHERE idCafe = ?',[$id])[0]->idSupp;
        $find = User::find($search);
        return view('/modifier-cafe', ['data' => $find]);

    }

    public function updateCafe(Request $req,$id){
        $cafe = User::find($id);

        $cafe->name = $req->cafeName;
        $cafe->telephone = $req->phone;
        $cafe->adresse = $req->adresse;

        $emailCheck = User::where('email', $req->email)->where('id', '!=', $id)->first();

        if($emailCheck){
            return redirect()->back()->with(['alert' => 'L\'email est déjà utilisé par un autre utilisateur.']);
        }
        if($req->secondEmail == $req->email){
            return redirect()->back()->with(['alert' => 'L\'email principale et le secondaire sont le meme.']);
        }
        $cafe->email = $req->email;
        $cafe->secondEmail = $req->secondEmail;


        $cafe->update();
        return redirect('tables-cafe');
    }


}
