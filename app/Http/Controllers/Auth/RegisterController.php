<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'Adresse' => ['required', 'string', 'max:255'],
            'Phone' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $search = DB::select('select max(idCafe) as max_id from users')[0]->max_id;

        $duration = 1;
        $unit = 'months';
        $paiement = 0;

        if ($data['offer'] == 'demo') {
            $duration = 15;
            $unit = 'days';
            $paiement = 1;
        } elseif (isset($data['duree']) && $data['duree'] == 12) {
            $duration = 12;
        }

        $nouvelle_abonnement = new Abonnement;
        $nouvelle_abonnement->idCafe = $search + 1;
        $nouvelle_abonnement->offre = $data['offer'];
        $nouvelle_abonnement->date_debut = Carbon::now();
        $nouvelle_abonnement->date_fin = Carbon::now()->add($unit, $duration);
        $nouvelle_abonnement->paiement = $paiement;
        $nouvelle_abonnement->save();

        return User::create([
            'idCafe' => $search + 1,
            'adresse' => $data['Adresse'],
            'role' => 'cafe',
            'telephone' => $data['Phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'idAbonnement' => $nouvelle_abonnement->id,
            'password' => Hash::make($data['password']),
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        //Mail::to('dalihmem47@gmail.com')
        //    ->send(new NewUserNotification($user));

        if ($request->offer == 'demo') {
            $this->guard()->login($user);
            return $this->registered($request, $user) ?: redirect($this->redirectPath());
        } else {
            event(new Registered($user));

            $abonnement = Abonnement::where('id', $user->idAbonnement)->first();

            $dateDebut = Carbon::parse($abonnement->date_debut);
            $dateFin = Carbon::parse($abonnement->date_fin);

            $dateDiffGreaterThanTwoMonths = $dateFin->diffInMonths($dateDebut) > 2;

            session()->put('data', $user);
            session()->put('abonnement', $abonnement);
            session()->put('dateDiffGreaterThanTwoMonths', $dateDiffGreaterThanTwoMonths);

            $this->guard()->login($user);
            return redirect('/payment_details');
        }
    }
}

/*
protected function create(array $data)
    {
        $search = DB::select('select max(idCafe) as max_id from users')[0]->max_id;

        $duration = 1;
        if ($data['offer'] == 'demo') {
            $duration = 7;
        } elseif (isset($data['duree']) && $data['duree'] == 12) {
            $duration = 12;
        }

        $nouvelle_abonnement = new Abonnement;
        $nouvelle_abonnement->idCafe = $search + 1;
        $nouvelle_abonnement->offre = $data['offer'];
        $nouvelle_abonnement->date_debut = Carbon::now();
        $nouvelle_abonnement->date_fin = ($data['offer'] == 'demo') ? Carbon::now()->addDays($duration) : Carbon::now()->addMonths($duration);
        $nouvelle_abonnement->save();

        return User::create([
            'idCafe' => $search + 1,
            'adresse' => $data['Adresse'],
            'role' => 'cafe',
            'telephone' => $data['Phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'idAbonnement' => $nouvelle_abonnement->id,
            'password' => Hash::make($data['password']),
        ]);
    }
*/
