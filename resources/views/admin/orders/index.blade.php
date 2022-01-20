@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'admin_orders','namePage' => 'Jiffystock Orders Management'])

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
              <h4 class="card-title"> Product Orders</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                      <thead>
                          <tr>
                              <th style="width: 20% ">Product Name</th>
                              <th style="width: 20% ">Payment</th>
                              <th style="width: 10% ">Delivery</th>
                              <th style="width: 20% ">Quantity</th>
                              <th style="width: 10% ">Order number</th>
                              <th style="width: 10% ">Status</th>
                              <th style="width: 10% ">Time</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $order)
                            @if($order->product)
                            <tr>
                              <td>{{ $order->product->name }}</td>
                                <td>{{ $order->payment }}</td>
                                <td>{{ $order->delivery }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->order->order_number }}</td>
                                <td>
                                  <span class="badge badge-primary">{{ $order->order->status }}</span>
                                </td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>

                                <!-- <td>
                                    <a href="/check-review/{{$order->id}}" class="btn btn-primary btn-sm">Check</a>
                                </td>
                                <td>{{ $order->status }}</td>
                                <td>
                                @if (Auth::user() && Auth::user()->usertype == "user")
                                @if($order->status=="pending")
                                    <a class="btn btn-primary" href="{{route('order-approve',$order->id)}}">Approve</a>
                                    <a class="btn btn-danger" href="{{route('order-reject',$order->id)}}">Reject</a>
                                @endif
                                @endif
                                </td> -->
                            </tr>
                            @endif
                          @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <!-- end container-fluid -->
    @endsection
