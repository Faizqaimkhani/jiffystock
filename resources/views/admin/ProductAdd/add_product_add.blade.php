@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_add_product','namePage' => 'Jiffystock Create Package Price'])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>

  <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">

                  <div class="card-title">
                    <h3>Insert Product Add</h3>
                  </div>
                  @if (session()->has('message'))
                          <div class="alert alert-primary alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                              </button>
                              <span>{{ session()->get('message') }}</span>
                          </div>
                          <br>
                          @endif
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

                    <form action="/product-add" method="post" enctype="multipart/form-data">
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
                                <label for="">Package</label>
                                <select name="package" id="" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($packages as $package)
                                    <option value="{{$package->id}}">{{$package->name}} <spanclass="font-weight-bolder ml-2">Price (${{$package->price}}</spanclass=>)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Buy through Wallet</button>
                            <a href="/product-add" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
