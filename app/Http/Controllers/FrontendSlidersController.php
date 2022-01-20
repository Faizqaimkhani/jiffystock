<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Advertisement;
use App\Models\Sliders;
use App\Models\Products;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendSlidersController extends Controller
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
        $sliders = Sliders::all();
        
        return view('admin.Frontend.Sliders.index')->with('sliders',$sliders );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(user::get());
        $users = User::all();
        
        return view('admin.Frontend.Sliders.add_slider')->with(compact('users'));
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
            'image'            => 'required|mimes:jpg,png,jpeg|max:5048',
            'heading'            => 'required',
            'text'            => 'required',
            
        ]);

        if ($request->image) {
            $image = uniqid() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/uploads/Sliders-Images'), $image);
        } else {
            $image = "";
        }

        Sliders::create([
            'image'         => $image,
            'heading'         => $request->input('heading'),
            'text'         => $request->input('text'),
            
        ]);

        return redirect('frontend-slider')->with('message', 'Slider Inserted Successfully');
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
        $slider = Sliders::select('*')->where('id', $id)->first();
        $users = User::get();
        return view('admin.Frontend.Sliders.edit_slider', compact('slider', 'users'));
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
        if ($request->image) {
            $request->validate([
                'image'            => 'required|mimes:jpg,png,jpeg|max:5048',
                'heading'            => 'required',
                'text'            => 'required',
               
            ]);
        } else {
            $request->validate([
                'heading'            => 'required',
                'text'            => 'required',
                
            ]);
        }

        if (!$request->image) {
            $image = $request->old_image;
        } else {
            $image = uniqid() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/uploads/Sliders-Images'), $image);
            $slider = Sliders::find($id);
            if ($slider->image) {
                if(file_exists(storage_path("app/public/uploads/Sliders-Images/" . $slider->image))){
                unlink(storage_path("app/public/uploads/Sliders-Images/" . $slider->image));
            }
            }
        }

        Sliders::where('id', $id)->update([
            'image'         => $image,
            'heading'         => $request->input('heading'),
            'text'         => $request->input('text'),
            
        ]);

        return redirect('/frontend-slider')->with('message', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Sliders::where('id', $id)->first();
        if ($slider->image) {
            if(file_exists(storage_path("app/public/uploads/Sliders-Images/" . $slider->image))){
            unlink(storage_path("app/public/uploads/Sliders-Images/" . $slider->image));
            }
        }
        $slider = Sliders::where('id', $id)->first();
        $slider->delete();
        return redirect('/frontend-slider')->with('message', 'Slider Deleted Successfully');
    }
    
}
