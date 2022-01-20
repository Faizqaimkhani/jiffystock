<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth('customer')->check()){
        $check =Wishlist::where(['product_id'=>$request->product_id,'customer_id'=>auth('customer')->id()])->get() ;
        
        if($check->count() > 0 ){
            
            $data['status'] = true; 
            $data['title']="success";
            $data['message'] = "product Already in Wishlist"; 


        }else{
            $wishlist =  new Wishlist();
            $wishlist->product_id=$request->product_id;
            $wishlist->customer_id=auth('customer')->id();
            $wishlist->save();
            $data['title']="success";
            $data['status'] = true; 
            $data['message'] = "product inserted to Wishlist"; 
        }
    }else{ 
        $data['title']="error";
        $data['status'] = true; 
        $data['message'] = "Please Login"; 
    }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Wishlist::find($id)->delete($id);
        $data['message'] ="Item Deleted From Wishlist";
        $data['title'] = "success";
        return $data;
    }
}
