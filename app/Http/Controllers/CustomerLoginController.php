<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
}
