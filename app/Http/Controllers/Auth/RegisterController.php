<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Customers;
use App\Models\CustomerWallet;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\Product_category;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:customer');
    }


    public function showRegistrationForm()
    {
      $countries = Country::all();
      $categories = Product_category::all();
      return view('auth.register',compact("countries","categories"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // die('validator');
        if($data['user_type'] == "user"){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','confirmed', Password::min(8)
                                                                ->mixedCase()
                                                                ->letters()
                                                                ->numbers()
                                                                ->symbols(),],
            'company' => ['required'],
            'company_license' => ['required'],
            'contact_number' => ['required'],
            'country' => ['required'],
            'captcha' => 'required|captcha',
            'terms_conditions' => 'accepted',
            'city' => ['required']
        ]);
        }else if($data['user_type'] == "customer"){
            // die('customer_val');
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
                'password' => ['required','confirmed', Password::min(8)
                                                                    ->mixedCase()
                                                                    ->letters()
                                                                    ->numbers()
                                                                    ->symbols(),],
                'company' => ['required'],
                'contact_number' => ['required'],
                'country' => ['required'],
                'city' => ['required'],
                'category' => ['required']
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCustomer(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            //'file' => ['required', 'file', 'mimes:jpeg,pdf,png,jfif,jpg'],
            'password' => ['required','confirmed', Password::min(8)
                                                                ->mixedCase()
                                                                ->letters()
                                                                ->numbers()
                                                                ->symbols(),],
            'company' => ['required'],
            'contact_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'category' => ['required'],
            'captcha' => 'required|captcha',
            'terms_conditions' => 'accepted',
        ]);

        $customer = new Customers();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->company = $request->company;
        $customer->contact_number = $request->contact_number;
        $customer->country = $request->country;
        $customer->city = $request->city;
        $customer->category_id = $request->category;
        $customer->vip = "0";
        $customer->usertype = "customer";
        $customer->save();


      $customer_id = $customer->id;

      CustomerWallet::create([
          'customer_id'    => $customer_id,
          'price'          => '0',
          'deposits'       => '0',
          'refunds'        => '0',
          'buy_products'   => '0'
      ]);

      return redirect()->intended('/login');
    }

    protected function create(array $data)
    {
        // die('create');

        if ($data['user_type'] == "user") {
            $path = Storage::putFile(storage_path('certificates/'), request()->file('file'));

            $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company' => $data['company'],
            'company_license' => $data['company_license'],
            'contact_number' => $data['contact_number'],
            'country' => $data['country'],
            'city' => $data['city'],
            'usertype' => 'user',
            'license' => $path,
        ]);
        $user_id = $user->id;


         Wallet::create([
                'user_id' => $user_id,
                'price'         => '0',
                'deposits'         => '0',
                'refunds'         => '0',
                'sell_products'         => '0'
            ]);

        return $user;

    } else if ($data['user_type'] == "customer") {
            // die('customer_create');
            $customer = Customers::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'company' => $data['company'],
                'contact_number' => $data['contact_number'],
                'country' => $data['country'],
                'city' => $data['city'],
                'category_id' => $data['category'],
                'vip' => '0',
                'usertype' => 'customer'
            ]);

            $customer_id = $customer->id;

            CustomerWallet::create([
                'customer_id'    => $customer_id,
                'price'          => '0',
                'deposits'       => '0',
                'refunds'        => '0',
                'buy_products'   => '0'
            ]);

            return $customer;

        }

    }
}
