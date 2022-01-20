<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPackagePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // parent::__construct();
        //Do your magic here
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (Auth::user()->usertype != "admin") {
                return redirect('home');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.Add Packaging Price.index')->with('prices', AddPackagePrice::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Add Packaging Price.add_package');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'days'            => 'required',
            'price'            => 'required',
        ]);

        AddPackagePrice::create([
            'name'         => $request->input('name'),
            'duration_in_days'         => $request->input('days'),
            'price'         => $request->input('price'),
        ]);


        return redirect('/add-package-price')->with('message', 'Package Price Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.Add Packaging Price.edit_package')->with('prices', AddPackagePrice::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'days'      => 'required',
            'price'     => 'required',
        ]);

        AddPackagePrice::where('id', $id)->update([
            'name'                 => $request->input('name'),
            'duration_in_days'     => $request->input('days'),
            'price'                => $request->input('price'),
        ]);

        return redirect('/add-package-price')->with('message', 'Package Price Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = AddPackagePrice::where('id', $id);
        $price->delete();

        return redirect('/add-package-price')->with('message', 'Package Price Deleted Successfully');
    }
}
