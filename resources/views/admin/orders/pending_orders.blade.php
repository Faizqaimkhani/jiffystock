@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'admin_pending_orders','namePage' => 'Jiffystock Admin Pending Orders Management'])

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
              <h4 class="card-title"> Product Pending Orders</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 20% ">Name</th>
                            <th style="width: 20% ">Email</th>
                            <th style="width: 20% ">Contact No</th>
                            <th style="width: 20% ">Address</th>
                            <th style="width: 20% ">Total Price</th>
                            <th style="width: 20% ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->contact_no }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td><a href="/order-approve/{{$order->id}}">Approved</a></td>
                            <td><a href="/order-cancel/{{$order->id}}">Cancel</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <!-- end container-fluid -->
    @endsection
