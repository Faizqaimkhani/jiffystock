<?php

namespace App\Http\Controllers\Company\Auth\Clearance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClearanceRegisterRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\EmailVerificationNotification;

class RegisterController extends Controller
{
  public function register(ClearanceRegisterRequest $request)
  {
    $file = $request->file('file')->store('public/certificates/');

    $newClearance = User::create(array_merge($this->data($request),["usertype" => "clearance-user", 'license_img' => $file]));

    $createCompany = Company::create([
      'user_id' => $newClearance->id,
      'name' => $request->clearance_company,
      'license' => $request->clearance_company_license,
      'contact_number' => $request->clearance_contact_number,
    ]);

    Wallet::create([
      'user_id' => $newClearance->id,
      'price' => 0,
    ]);

    Auth::guard('clearance_user')->loginUsingId($newClearance->id);

    auth()->guard('clearance_user')
            ->user()
            ->notify(new EmailVerificationNotification('clearance.verification.verify'));

    return redirect()->route('clearance.verification.notice');
  }

  public function data($request)
  {
    return [
      'name' => $request->clearance_name,
      'email' => $request->clearance_email,
      'password' => Hash::make($request->clearance_password),
      'country' => $request->clearance_country,
      'city' => $request->clearance_city,
    ];
  }

}
