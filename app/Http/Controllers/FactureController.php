<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Abonnement;
use Carbon\Carbon;

class FactureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function infoFacture(){

        $abonnement = Abonnement::where('id', Auth::user()->idAbonnement)->first();

        $dateDebut = Carbon::parse($abonnement->date_debut);
        $dateFin = Carbon::parse($abonnement->date_fin);

        $dateDiffGreaterThanTwoMonths = $dateFin->diffInMonths($dateDebut) > 2;

        if($abonnement->offre == 'demo'){
            $montantHT = 0.00;
            $montantTTC = 0.00;
        }elseif($abonnement->offre == 'basique'){
            if($dateDiffGreaterThanTwoMonths){
                $montantHT = 390.00;
                $montantTTC = 464.10;
            }else{
                $montantHT = 39.00;
                $montantTTC = 46.41;
            }

        }else{
            if($dateDiffGreaterThanTwoMonths){
                $montantHT = 790.00;
                $montantTTC = 940.10;
            }else{
                $montantHT = 79.00;
                $montantTTC = 94.01;
            }
        }

        $paid = false ;
        if($abonnement->paiement == 1){
            $paid = true;
        }

        return view('factures', ['abonnement' => $abonnement, 'montantHT' => $montantHT, 'montantTTC' => $montantTTC, 'paid' => $paid]);
    }

    public function telechargerFacture(){
        $user = User::where('id', Auth::user()->id)->first();

        $abonnement = Abonnement::where('id', $user->idAbonnement)->first();

        $dateDebut = Carbon::parse($abonnement->date_debut);
        $dateFin = Carbon::parse($abonnement->date_fin);

        $dateDiffGreaterThanTwoMonths = $dateFin->diffInMonths($dateDebut) > 2;

        session()->put('data', $user);
        session()->put('abonnement', $abonnement);
        session()->put('dateDiffGreaterThanTwoMonths', $dateDiffGreaterThanTwoMonths);
        session()->put('telechargerFacture', true);

        return redirect('/payment_details');
    }
}
