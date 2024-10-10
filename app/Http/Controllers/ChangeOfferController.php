<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abonnement;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class ChangeOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ChangeOfferView(){
        $abonnement = Abonnement::where('id', Auth::user()->idAbonnement)->first();

        return view('change_offer.change_offer_view', ['abonnement' => $abonnement]);
    }

    public function changeOffer(Request $req){
        $user = Auth::user();

        $validated = $req->validate([
            'plan_name' => 'required|string',
            'duration' => 'required|integer|in:1,12'
        ]);

        $abonnement = Abonnement::where('id', $user->idAbonnement)->first();

        if($abonnement){
            $duration = $req->duration;
            $unit = 'months';
            $paiement = 0;

            if ($req->plan_name == 'demo') {
                $duration = 15;
                $unit = 'days';
                $paiement = 1;
            }

            $abonnement->offre = $req->plan_name;
            $abonnement->date_debut = Carbon::now();
            $abonnement->date_fin = Carbon::now()->add($unit, $duration);
            $abonnement->paiement = $paiement;

            $abonnement->save();

            if($req->plan_name == 'demo'){
                return redirect('/dashboard')->with('change-offer', 'You are now in demo.');
            }else{
                $dateDebut = Carbon::parse($abonnement->date_debut);
                $dateFin = Carbon::parse($abonnement->date_fin);

                $dateDiffGreaterThanTwoMonths = $dateFin->diffInMonths($dateDebut) > 2;

                session()->put('data', $user);
                session()->put('abonnement', $abonnement);
                session()->put('dateDiffGreaterThanTwoMonths', $dateDiffGreaterThanTwoMonths);

                return view('change_offer.change-offer-facture');
            }

        }else{
            return redirect()->back()->with('alert', 'Unable to find the subscription.');
        }
    }
}
