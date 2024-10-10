<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Abonnement;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $abonnement = Abonnement::where('id', $user->idAbonnement)->first();
            $now = Carbon::now();

            if ($abonnement) {
                if ($abonnement->offre == 'demo' && $now->lte(Carbon::parse($abonnement->date_fin))) {
                    return $this->guard()->attempt(
                        $this->credentials($request), $request->filled('remember')
                    );
                } elseif (in_array($abonnement->offre, ['basique', 'professionnel']) &&
                          $now->lte(Carbon::parse($abonnement->date_fin))) {
                    return $this->guard()->attempt(
                        $this->credentials($request), $request->filled('remember')
                    );
                }
            }
        }

        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}

/*
protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $abonnement = Abonnement::where('id', $user->idAbonnement)->first();
            $now = Carbon::now();

            if ($abonnement) {
                if ($abonnement->offre == 'demo' && $now->lte(Carbon::parse($abonnement->date_fin))) {
                    return $this->guard()->attempt(
                        $this->credentials($request), $request->filled('remember')
                    );
                } elseif (in_array($abonnement->offre, ['basique', 'professionnel']) &&
                          $abonnement->paiement == 1 &&
                          $now->lte(Carbon::parse($abonnement->date_fin))) {
                    return $this->guard()->attempt(
                        $this->credentials($request), $request->filled('remember')
                    );
                }
            }
        }

        return false;
    }
*/
