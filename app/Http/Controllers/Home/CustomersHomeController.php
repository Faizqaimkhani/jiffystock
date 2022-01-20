<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
        return view('home.customers');
    }
}
