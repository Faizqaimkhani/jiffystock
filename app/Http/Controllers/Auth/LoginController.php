<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('customer');
    }
    public function redirectToGoogle()

    {
        $url = route('user.callaback');

        config(['services.google.redirect' =>$url]);
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()

    {

        try {
            $url = route('user.callaback');
            config(['services.google.redirect' =>$url]);
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                 return redirect('/');

            }else{
                $pass =Str::random(8);

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,
                    'password'=>  Hash::make($pass),
                    'company'=> 'Unknown',
                    'company_license'=>'unauthorized',
                    'contact_number'=>'0000000000',
                    'country'=>'0',
                    'usertype'=>'user',
                    'city'=>0,
                ]);
                Wallet::create([
                    'customer_id'    => $newUser->id,
                    'price'          => '0',
                    'deposits'       => '0',
                    'refunds'        => '0',
                    'buy_products'   => '0'
                ]);

                Auth::login($newUser);

                return redirect()->back();

            }

        } catch (Exception $e) {


           return redirect('/login')->withErrors('Google Authentication Failed');

        }

    }
}
