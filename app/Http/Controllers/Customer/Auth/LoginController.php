<?php

namespace App\Http\Controllers\Customer\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomerWallet;
use Exception;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


     public function showLoginForm()
    {
        return view('auth.login', [
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'customer.password.request',
        ]);
    }

    /**
     * Login the customer.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email_cus' => 'required|email',
            'password_cus' => 'required|min:8'
        ]);
        // $this->validator($request);
        // if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
        if (Auth::guard('customer')->attempt(['email' => $request->email_cus, 'password' => $request->password_cus])) {
            return redirect()
                ->intended('/customer-home')
                ->with('status', 'You are Logged in as customer!');
        }
        // die('fail');
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the customer.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()
            ->route('customer.login')
            ->with('status', 'customer has been logged out!');
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|string|min:8|max:24',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('email_cus', 'Login failed, Cradential does not match!');
    }
    public function redirectToGoogle()

    {   
        $url = route('customer.callaback');
        
        config(['services.google.redirect' =>$url]);
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()

    {
        
        try {
            $url = route('customer.callaback');
            config(['services.google.redirect' =>$url]);
            $user = Socialite::driver('google')->user();
            
            $finduser = Customers::where('google_id', $user->id)->first();

            if($finduser){

                Auth::guard('customer')->login($finduser);

                 return redirect('/');

            }else{
                $pass =Str::random(8);
                
                $newUser = Customers::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,
                    'password'=>  Hash::make($pass),
                    'company'=> 'Unknown',
                    'category_id'=>'0',
                    'contact_number'=>'0000000000',
                    'country'=>'0',
                    'city'=>0,
                    'vip'=>0,
                    'usertype'=>'Customer'
                ]);
                CustomerWallet::create([
                    'customer_id'    => $newUser->id,
                    'price'          => '0',
                    'deposits'       => '0',
                    'refunds'        => '0',
                    'buy_products'   => '0'
                ]);
                Auth::guard('customer')->login($newUser);


                return redirect()->back();

            }

        } catch (Exception $e) {
          
        dd($e);
           return redirect('/login')->withErrors('Google Authentication Failed');

        }

    }
}
