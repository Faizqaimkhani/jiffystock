<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
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
        return view('admin.Colors.index')->with('colors', Color::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Colors.add_color');
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
            'code'            => 'required',
        ]);

        Color::create([
            'name'         => $request->input('name'),
            'code'         => $request->input('code'),
        ]);

        return redirect('/colors')->with('message', 'Color Inserted Successfully');
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
        return view('admin.Colors.edit_color')->with('color', Color::where('id', $id)->first());
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
            'code'            => 'required',
        ]);

        Color::where('id', $id)->update([
            'name'         => $request->input('name'),
            'code'         => $request->input('code'),
        ]);

        return redirect('/colors')->with('message', 'Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::where('id', $id);
        $color->delete();

        return redirect('/colors')->with('message', 'Color Deleted Successfully');
    }
}
