<?php

namespace App\Http\Controllers\Company\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddPackagePrice;
use App\Models\Advertisement;
use App\Models\Products;
use App\Models\Wallet;

class AdvertisementController extends Controller
{
  public function index()
  {
      $adds= Advertisement::where('user_id', auth()->guard('shipment_user')->id())->get();
      return view('company.shipment.advertisements.index')->with(compact('adds'));
  }
  public function create()
  {
      $packages = AddPackagePrice::get();

      return view('company.shipment.advertisements.create', compact('packages'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'text'=> 'required',
          'package' => 'required',
          'image' => 'mimes:jpg,png,jpeg,jpg|max:5048',
      ]);

      if ($request->image) {
          $image = uniqid() .  '.' . $request->image->extension();
          $request->image->move(storage_path('app/public/uploads/shipment/advertisement-images'), $image);
      } else {
          $image = "";
      }


      $package = AddPackagePrice::where('id', $request->input('package'))->first();
      $wallet = Wallet::where('user_id', auth()->guard('shipment_user')->id())->first();
      if($wallet->price < $package->price){
          return back()->withErrors( 'Your Wallet Balance is Less');
      }
      $wallet_price = $wallet->price - $package->price;

      Wallet::where('user_id', auth()->guard('shipment_user')->id())->update([
          'price' => $wallet_price
      ]);
      Advertisement::create([
          'text' => $request->input('text'),
          'pacakge_id' => $request->input('package'),
          'user_id'=>auth()->guard('shipment_user')->id(),
          'image' => $image,
          'status'=>0,
      ]);

      return redirect()->route('shipment.advertisement')->with('message', 'Advertisement Inserted Successfully');
  }
  public function edit($id)
  {
      $add = Advertisement::find($id);
      $packages = AddPackagePrice::get();
      return view('company.shipment.advertisements.edit', compact('add', 'packages'));
  }
  public function update(Request $request)
  {
      $request->validate([
          'text'            => 'required',
          'package_id'            => 'required',
          'image'        => 'mimes:jpg,png,jpeg|max:5048',
      ]);
      if (!$request->image) {
          $image = $request->old_image;
      } else {
          $image = uniqid() . '-' . $request->name . '.' . $request->image->extension();
          $request->image->move(storage_path('app/public/uploads/shipment/advertisement-images'), $image);
          $image_file = Advertisement::find($request->id);
          if ($image_file->image) {
              unlink(storage_path("app/public/uploads/shipment/advertisement-images/" . $image_file->image));
          }
      }
      Advertisement::where('id', $request->id)->update([
          'text' => $request->input('text'),
          'pacakge_id' => $request->input('package_id'),
          'image' => $image,

      ]);
      return redirect()->route('shipment.advertisement')->with('message', 'Advertisement Updated Successfully');
  }
  public function delete(Request $request)
  {
      $images = Advertisement::findOrFail($request->id);

      if ($images->image) {
          unlink(storage_path("app/public/uploads/shipment/advertisement-images/" . $images->image));
      }

      $product = Advertisement::where('id', $request->id);
      $product->delete();
      return redirect()->route('shipment.advertisement')->with('message', 'Advertisement Deleted Successfully');
  }
}
