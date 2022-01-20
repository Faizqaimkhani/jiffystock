@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'bids','namePage' => 'Jiffystock Product Bids Management'])

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
              <h4 class="card-title"> Product Bids</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 20%">User</th>
                            <th style="width: 20%">Customer</th>
                            <th style="width: 20%">Product</th>
                            <th style="width: 10%">Quantity</th>
                            <th style="width: 10%">Bid</th>
                            <th style="width: 10%">Date/Time</th>
                            <th style="width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                          @if($bid->user)
                            <tr>
                                <td>{{ $bid->user->name }}</td>
                                <td>{{ $bid->customer->name }}</td>
                                <td>{{ $bid->products->name }}</td>
                                <td>{{ $bid->auction->quantity }}</td>
                                <td>{{ $bid->price}}</td>
                                <td>{{ date('d/F/Y', strtotime($bid->created_at))}}</td>
                                <td>{{ $bid->status}}</td>
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
