<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class HomeController extends Controller
{
  public function showRegistrationForm()
  {
      captcha_img();
      $countries = Country::all();
      return view('company.auth.register',compact("countries"));
  }

  public function showLoginForm()
  {
      return view('company.auth.login');
  }
}
