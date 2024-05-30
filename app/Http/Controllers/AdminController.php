<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function getAdmin(){
        $admin = Admin::all(); //select * from Admin
        
        return view('tables-admin',['data' => $admin]);
    }

    public function deleteAdmin($id){
        $search = Admin::find($id); //select * from admin where id==$id;

        $search->delete();

        return redirect('tables-admin');
    }

    /*public function modifierAdmin($id){
        $admin = Admin::find($id);
        
        return redirect()->route('modifier-admin', ['data' => $admin]);
    }*/

    public function ajoutAdmin(Request $reg){
        $admin = new Admin;

        $admin->nom = $reg->nom;
        $admin->username = $reg->username;
        $admin->email = $reg->email;
        $admin->password = $reg->pwd;

        $all = Admin::all();
        foreach($all as $item){
            if($item->username == $reg->username){
                return redirect('form')->with('alert', 'this name already exist.');
            }
        }

        $admin->save();
        return redirect('tables-admin');
    }

    public function verif(Request $reg){ // laravel/ui
        $all = Admin::all();
        foreach($all as $item){
            if($item->username == $reg->username and $item->password == $reg->password){
                return redirect('form');
            }
        }
        return redirect('login')->with('alert', 'Username or password is wrong.');
    }
}