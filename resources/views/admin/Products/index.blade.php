@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_products','namePage' => 'Jiffystock Product Management'])

@section('content')
<!-- begin container-fluid -->
   <div class="panel-header panel-header-sm">
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
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <span>{{ session()->get('error') }}</span>
    </div>
    <br>
    @endif
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Product Management</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                        <a href="/products/create" class="btn btn-primary">Add Product</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                              <thead>
                                  <tr>
                                      <th style="width: 30%">Name</th>
                                      <th style="width: 20%">Category</th>
                                      <th style="width: 20%">Sub Category</th>
                                      <th style="width: 10%">Price</th>
                                      <th style="width: 10%">Unit</th>
                                      <th style="width: 10%">Stock Quantity</th>
                                      <th style="width: 10%" class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($products as $p)
                                      <tr>
                                          <td>{{ $p->name }}</td>
                                          <td> @if(isset($p->sub_category)==true && isset($p->sub_category->product_category)==true)
                                              {{ $p->sub_category->product_category->name}}
                                              @endif</td>
                                          <td>
                                          @if(isset($p->sub_category)==true )
                                              {{ $p->sub_category->name}}
                                          @endif
                                          </td>
                                          <td>{{ $p->price}}</td>
                                          <td>{{ $p->unit}}</td>
                                          <td>{{ $p->stock_quantity}}</td>
                                          <td class="d-flex"><a class="btn btn-primary" href="/products/{{ $p->id }}/edit"><i class="fa fa-edit"></i></a>
                                              <form action="/products/{{ $p->id }}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                              </form>
                                      </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                              <!-- <tfoot>
                                  <tr>
                                      <th>Name</th>
                                  </tr>
                              </tfoot> -->
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
@endsection
