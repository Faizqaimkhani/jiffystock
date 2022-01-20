<?php

namespace App\Http\Controllers\Auth\Login;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class CustomersController extends DefaultLoginController
{
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login.customer');
    }
    public function username()
    {
        return 'id';
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
