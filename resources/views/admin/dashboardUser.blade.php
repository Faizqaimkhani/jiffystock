@extends('layouts.dashboard')

@section('content')
<style>
    .card {
    display: flex;
    justify-content: center;
    padding: 20px;
}
.custom_heading{
    color:#f18819;
    font-size:20px

}
</style>

                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} Supplier</div>

                <div class="card-body">
                <div class="row">
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Wallet</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{isset($wallet)==true?$wallet->price:0}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Products</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_products}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Published Products</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_Adds_Product}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Advertisement</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$adverttisemnet}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Auction</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$auction}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Orders</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$orderTotal}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card_head custom_heading">
                    <h4>Orders</h4>
                </div>
                <div class="card-body">
                    <div class="datatable-wrapper table-responsive">
                        <table id="datatable" class="display compact table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20% ">Product Name</th>
                                    <th style="width: 20% ">Payment</th>
                                    <th style="width: 10% ">Delivery</th>
                                    <th style="width: 20% ">Qunatity</th>
                                    <th style="width: 10% ">Time</th>
                                    <!-- <th style="width: 10% ">Review</th>
                                    <th style="width: 10% ">Status</th>
                                    <th style="width: 10% ">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->delivery }}</td>
                                    <td>{{ $order->quantity }}</td>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
</div>

@endsection
