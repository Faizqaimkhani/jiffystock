@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'cities','namePage' => 'Jiffystock Add to Auction'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">

                  <div class="card-title">
                    <h3>Add to Auction</h3>
                  </div>

                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="color: red">
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/product-auction" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="">Product</label>
                                <select name="product_id" id="" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($products as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Quantity</label>
                                <input type="number" class="form-control" required name="quantity">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Minimum Bid</label>
                                <input type="number" class="form-control" required name="min_bid">
                            </div>
                            <div class="col">
                                <label for="">Package</label>
                                <select name="package" id="" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($packages as $package)
                                    <option value="{{$package->id}}">{{$package->name}} <span class="font-weight-bolder ml-2">Price (${{$package->price}}</span>)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Buy through Wallet</button>
                            <a href="/product-auction" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
