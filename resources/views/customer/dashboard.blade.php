@extends('new-layouts.dashboard.layouts.app',['namePage' => "Jiffystock Customer Dashboard", 'activePage' => 'home'])

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
h4{
    color:#f18819;

}
</style>
<div class="panel-header panel-header-lg">
  <canvas id="bigDashboardChart"></canvas>
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
      <div class="col-lg-4 col-md-6">
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
      <div class="col-lg-4 col-md-6">
        <div class="card" style="height: 90px;">
            <div class="row py-3 custom_heading">
                <div class="col-8 text-center">
                   <h4> Bids</h4>
                </div>
                <div class="col-4">
                   <h4> {{$bids}}</h4>
                </div>
            </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card" style="height: 90px;">
            <div class="row py-3 custom_heading">
                <div class="col-8 text-center">
                   <h4> Orders</h4>
                </div>
                <div class="col-4">
                   <h4> {{$ordertotal}}</h4>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-md-6">
        <div class="card  card-tasks">
          <div class="card-header ">
            <h5 class="card-category">Backend development</h5>
            <h4 class="card-title">Tasks</h4>
          </div>
          <div class="card-body ">
            <div class="table-full-width table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" checked>
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </td>
                    <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </button>
                      <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox">
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </td>
                    <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </button>
                      <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" checked>
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </td>
                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </button>
                      <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">All Orders</h5>
            <h4 class="card-title"> Recent Orders</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">

                  <th style="width: 20% ">Product Name</th>
                  <th style="width: 20% ">Payment</th>
                  <th style="width: 10% ">Delivery</th>
                  <th style="width: 20% ">Qunatity</th>
                  <th style="width: 10% ">Time</th>
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
                  @if($orders->count() < 1)
                  <tr>
                      No Orders Available Right now
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush

@endsection
