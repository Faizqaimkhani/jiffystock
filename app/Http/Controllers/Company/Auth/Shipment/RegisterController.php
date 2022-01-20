<?php

namespace App\Http\Controllers\Company\Auth\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShipmentRegisterRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\EmailVerificationNotification;

class RegisterController extends Controller
{
    public function register(ShipmentRegisterRequest $request)
    {
      $file = $request->file('file')->store('public/certificates/');

      $newShipment = User::create(array_merge($this->data($request),["usertype" => "shipment-user", 'license_img' => $file]));


      $createCompany = Company::create([
        'user_id' => $newShipment->id,
        'name' => $request->shipment_company,
        'license' => $request->shipment_company_license,
        'contact_number' => $request->shipment_contact_number,
      ]);
      Wallet::create([
        'user_id' => $newShipment->id,
        'price' => 0,
      ]);

      Auth::guard('shipment_user')->loginUsingId($newShipment->id);

      auth()->guard('shipment_user')
              ->user()
              ->notify(new EmailVerificationNotification('shipment.verification.verify'));

      return redirect()->route('shipment.verification.notice');
    }

    public function data($request)
    {
      return [
        'name' => $request->shipment_name,
        'email' => $request->shipment_email,
        'password' => Hash::make($request->shipment_password),
        'country' => $request->shipment_country,
        'city' => $request->shipment_city,
      ];
    }
}
