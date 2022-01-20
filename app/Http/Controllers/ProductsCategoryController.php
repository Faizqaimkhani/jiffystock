<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsCategoryController extends Controller
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
        return view('admin.Product Categories.index')->with('p_categories', Product_category::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Product Categories.add_category');
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
          'icon'            => 'required',
        ]);

        Product_category::create([
          'name'         => $request->input('name'),
          'icon'          => $request->input('icon'),
        ]);

        return redirect('/products-category')->with('message', 'Category Inserted Successfully');
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
        return view('admin.Product Categories.edit_category')->with('p_category', Product_category::where('id', $id)->first());
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
          'icon'            => 'required',
        ]);

        Product_category::where('id', $id)->update([
          'name'         => $request->input('name'),
          'icon'            => $request->input('icon'),
        ]);

        return redirect('/products-category')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Product_category::where('id', $id);
        $team->delete();

        return redirect('/products-category')->with('message', 'Category Deleted Successfully');
    }
}
