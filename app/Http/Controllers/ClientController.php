<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getClient(){
        $clients = User::where('idCafe', Auth::user()->idCafe)
        ->where('role', 'client')
        ->get();
        return view('tables-client', ['data' => $clients]);
    }

    public function deleteClient($id){
        $search = User::where('idCafe', Auth::user()->idCafe)
              ->where('idClient', $id)
              ->first();

        if ($search) {
            $search->delete();
        }

        return redirect('tables-client');

    }

    public function ajoutClient(Request $req){
        $search = DB::table('users')
        ->where('idCafe', Auth::user()->idCafe)
        ->max('idClient');
        $client = new User;
        $client->idCafe = Auth::user()->idCafe;
        $client->idClient = $search+1;
        $client->numTable = $req->nTable;
        $client->name = $req->nom;

        $client->role = 'client';
        //dd($client);
        $client->save();
        return redirect('form')->with('alert', 'Client Added Successfully.');
        /*$client = new Client;

        $client->idCafe = $reg->cafe()->id;
        $client->nom = $reg->nom;
        $client->numTable = $reg->nTable;

        $client->save();
        return redirect('form');*/
    }

    public function getClientId($id){
        $search = DB::select('SELECT id as idSupp FROM users WHERE idCafe = ? and idClient = ?',[ Auth::user()->idCafe ,$id])[0]->idSupp;
        $find = User::find($search);
        return view('/modifier-client', ['data' => $find]);
    }

    public function updateClient(Request $req,$id){
        $client = User::find($id);

        $client->name = $req->nom;
        $client->numTable = $req->nTable;

        $client->update();
        return redirect('tables-client');
    }
}
