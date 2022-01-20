@extends('company.layouts.app')
@include('company.layouts.shipment-sidebar',['activePage' => 'services'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Shipment Add Service"])
  <div class="panel-header panel-header-sm">
   </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
              <div class="container">
              <div class="card-header">
                <div class="card-title">
                  <h3>Change Order Status</h3>
                </div>
              </div>
                <div class="card-body">
                  <form class="" action="{{ route('shipment.order.status.change') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ request('order_id') }}">
                    <div class="form-group">
                      <label>Status :</label>
                      <select class="form-control" name="status">
                        <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                        <option value="on the way" @if($order->status == 'on the way') selected @endif>On the way</option>
                        <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
                      </select>
                    </div>
                    <div class="form-group my-5">
                      <button type="submit" name="button" class="btn btn-lg btn-primary">Change</button>
                    </div>
                  </form>
                </div>
                  </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->

@endsection

@include('company.layouts.partials.service')
