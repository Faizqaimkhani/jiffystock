<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSupplier;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Country;
use App\Models\Company;
use App\Models\Customers;
use App\Models\AdminWallet;
use App\Notifications\SupplierFundEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AccountVerificationEmail;
use App\Notifications\AccountRefuteNotification;

class SupplierController extends Controller
{

    public function __construct()
    {
      $this->middleware(function ($request, $next) {
          if (auth()->user()->usertype != "admin") {
              return redirect('home');
          }
          return $next($request);
      })->except('index');
    }


    public function index(Request $request)
    {
        $sellers = User::where('name', 'like', '%'.$request->get('search').'%')
                          ->where('usertype','user')
                          ->when($request->get('supplier') == 'top', function($q) use($request) {
                            $q->whereHas('reviews')->withCount(['reviews as rating' => function($query) use($request) {
                              $query->select(\DB::raw('coalesce(avg(rating),0)'));
                            }])->orderByDesc('rating');
                          })->latest()
                          ->paginate(9)
                          ->withQueryString();
        $premium_sellers = User::where('usertype','user')
                                ->whereHas('advertisements')
                                ->latest()
                                ->limit(3)
                                ->get();
        return view('front.sellers', compact('sellers','premium_sellers'));
    }

    public function create(Request $request)
    {
      $countries = Country::get();
      return view('admin.suppliers.create',compact('countries'));
    }

    public function store(AdminStoreSupplier $request)
    {
      $customer = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
        "country" => $request->country,
        "city" => $request->city,
        "usertype" => "user",
      ]);

      $createCompany = Company::create([
        'user_id' => $customer->id,
        'name' => $request->company,
        'license' => $request->company_license,
        'contact_number' => $request->contact_number,
      ]);

      return redirect()->route("suppliers")->with(['message' => "Supplier Added Successfully"]);
    }


    public function addFunds()
    {
      return view('admin.suppliers.add-fund');
    }

    public function storeFunds(Request $request)
    {
      $request->validate([
        'price' => 'required|numeric|min:1',
        'user_id' => 'required|numeric'
      ]);

      $wallet = Wallet::where('user_id', $request->user_id);
      $admin_wallet = AdminWallet::where('user_id',auth()->id());
      $user = User::where('id', $request->user_id)->first();

      if($admin_wallet->exists()) {
        if($admin_wallet->first()->price >= $request->price)
        {
          $subtractFromAdmin = $admin_wallet->update([
            'price' => $admin_wallet->first()->price - $request->price
          ]);
          if ($wallet->exists()) {
            $money = ($wallet->first()->price + $request->price);
            $wallet->update([
                'price' => $money
            ]);
          } else {
            $money = $request->price;
            $addToWallet = $wallet->create([
              'price' => $money,
              'user_id' => $request->user_id,
            ]);
            User::where('id', $request->user_id)->update([
              'wallet_id' => $addToWallet->id
            ]);
          }
          $user->notify(new SupplierFundEmail($money));
          return redirect()->route('suppliers')->with(["message" => "Funds Transfered Successfully"]);
        }
      }
      return redirect()->route('suppliers')->with(["error" => "Admin Wallet do not have sufficient Funds"]);
    }

    public function verify($id)
    {
      $user = User::findOrFail($id);
      if($user->badge_verification_status == 1)
      {
        $user->update(['badge_verification_status' => 2]);
        $user->notify(new AccountVerificationEmail);
        return redirect()->back()->with(['message'=> "Account Verified Successfully"]);
      }
      return redirect()->back()->with(['error'=> "Account Could not be Verified"]);
    }
    public function unverify($id)
    {
      $user = User::findOrFail($id);
      if($user->badge_verification_status == 2)
      {
        $user->update(['badge_verification_status' => 1]);
        $user->notify(new AccountRefuteNotification);
        return redirect()->back()->with(['message'=> "Account Unverified Successfully"]);
      }
      return redirect()->back()->with(['error'=> "Account Could not be Verified"]);

    }
}
