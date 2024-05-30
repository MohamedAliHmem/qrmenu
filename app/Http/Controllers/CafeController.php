<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
class CafeController extends Controller
{
    public function getCafe(){
        $search = DB::select('SELECT idCafe,name,adresse,telephone FROM users WHERE idCafe = ? limit 1',[Auth::user()->idCafe]);
        return view('tables-cafe',['data'=> $search]);
        /*$cafes = Cafe::all();
        return view('tables-cafe',['data'=> $cafes]);*/
    }

    public function deleteCafe($id){
        $search = DB::select('SELECT id as idSupp FROM users WHERE idCafe = ?',[$id])[0]->idSupp;
        $find = User::find($search);
        $find->delete();
        return redirect('/');
        /*$search = Cafe::find($id);

        $search->delete();

        return redirect('tables-cafe');*/
    }

 /*   public function ajoutCafe(Request $req){

        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2000048',
        ]);
        $search = DB::select('SELECT MAX(idCafe) AS max_id FROM users WHERE idOwner = ?', [Auth::user()->idOwner])[0]->max_id;
        $cafe = new User;   
        $cafe->idOwner = Auth::user()->idOwner;
        $cafe->idCafe = $search+1;
        $cafe->nameRole = $req->cafeName;
        $cafe->telephone = $req->phone;
        $cafe->adresse = $req->adresse;


        $cafe->role = 'cafe';
        
        //$cafe->logo = $req->logo;
        if ($req->hasFile('logo')) {
            $cafe->logo = $req->file('logo')->store('images','public');
        }     
        $cafe->save();
        return redirect('/dashboard');
        -----------
        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2000048', // Validation du fichier logo
        ]);

        $cafe = new Cafe;
        $cafe->idUser = Auth::user()->id;
        $cafe->nom = $req->cafeName;
        $cafe->telephone = $req->phone;
        $cafe->adresse = $req->adresse;
        
        //$cafe->logo = $req->logo;
        if ($req->hasFile('logo')) {
            $cafe->logo = $req->file('logo')->store('images','public');
        }     
        $cafe->save();
        return redirect('/dashboard');
    }*/

    public function getCafeId($id){
        $search = DB::select('SELECT id as idSupp FROM users WHERE idCafe = ?',[$id])[0]->idSupp;
        $find = User::find($search);
        return view('/modifier-cafe', ['data' => $find]);
        /*$cafe = Cafe::find($id);

        return view('/modifier-cafe', ['data' => $cafe]); //compact('cafe')*/
    }

    public function updateCafe(Request $req,$id){
        $cafe = User::find($id);
        
        $cafe->name = $req->cafeName;
        $cafe->telephone = $req->phone;
        $cafe->adresse = $req->adresse;
           
        $cafe->update();
        return redirect('tables-cafe');
    }
    /*$cafe = Cafe::find($req->id);
        $req->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2000048', // Validation du fichier logo
        ]);
        $newC = new Cafe;

        $newC->id = $req->id;
        $newC->idUser = $req->idUser;
        $newC->nom = $req->cafeName;
        $newC->telephone = $req->phone;
        $newC->adresse = $req->adresse;
        if ($req->hasFile('logo')) {
            $newC->logo = $req->file('logo')->store('images','public');
        }     
        $cafe = $newC;
        $cafe->save();
        return redirect('tables-cafe');*/
}
