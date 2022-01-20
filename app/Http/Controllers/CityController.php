<?php

namespace App\Http\Controllers;

use App\Models\City; 
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HelperController;
 
class CityController extends Controller
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
        return view('admin.City.index')->with('cities', City::select('*')->orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.City.add_city')->with('countries', Country::get());
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
            'country'            => 'required'
        ]);

        City::create([
            'name'         => $request->input('name'),
            'country_id'         => $request->input('country')
        ]);

        return redirect('/city')->with('message', 'City Inserted Successfully');
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
        $city = City::select('*')->where('cities.id', $id)->first();
        $countries = Country::get();

        return view('admin.City.edit_city', compact('city', 'countries'));
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
            'name'            => 'required',
            'country'            => 'required',
        ]);

        City::where('id', $id)->update([
            'name'         => $request->input('name'),
            'country_id'         => $request->input('country'),
        ]);

        return redirect('/city')->with('message', 'City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = City::where('id', $id);
        $team->delete();

        return redirect('/city')->with('message', 'City Deleted Successfully');
    }

}
