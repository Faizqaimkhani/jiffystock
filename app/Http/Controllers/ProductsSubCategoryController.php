<?php

namespace App\Http\Controllers;


use App\Models\Product_category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsSubCategoryController extends Controller
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
        return view('admin.Product Categories.Sub Categories.index')->with('sub_categories', Sub_category::select('*')->orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Product Categories.Sub Categories.add_sub_category')->with('categories', Product_category::get());
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
            'category'            => 'required'
        ]);

        $sub_cat = Sub_category::create([
            'name'         => $request->input('name'),
            'icon'            => $request->input('icon'),
            'category_id'         => $request->input('category'),
        ]);

        // dd($sub_cat->id);
        return redirect('/products-sub-category')->with('message', 'Product Sub Category Inserted Successfully');
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
        $sub_category = Sub_category::select('*')->where('id', $id)->first();
        $categories = Product_category::get();

        return view('admin.Product Categories.Sub Categories.edit_sub_category', compact('sub_category', 'categories'));
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
            'category'        => 'required',
        ]);

        Sub_category::where('id', $id)->update([
          'name'            => $request->input('name'),
          'icon'            => $request->input('icon'),
          'category_id'     => $request->input('category'),
        ]);

        return redirect('/products-sub-category')->with('message', 'Product Sub Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = Sub_category::where('id', $id);
        $sub_category->delete();

        return redirect('/products-sub-category')->with('message', 'Products Sub Category Deleted Successfully');
    }

    public function sub_categories($id)
    {

        $data['status'] = 400;

        $sub_categories = Sub_category::where('category_id', $id)->get();

        if ($sub_categories) {
            $data['status'] = 200;
            $data['data'] = $sub_categories;
        }

        return json_encode($data);
    }

}
