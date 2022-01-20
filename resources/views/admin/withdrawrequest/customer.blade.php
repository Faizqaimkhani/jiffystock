@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'withdraw_customers','namePage' => 'Jiffystock Admin Withdraw Customers Management'])

@section('content')
<style media="screen">
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
  color: #fff;
  background-color: #f96332!important;
}
</style>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div>
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="nav-item  active text-light"><a class="nav-link" href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Request</a></li>
                            <li role="presentation" class="nav-item"><a class="nav-link" href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
                            <li role="presentation" class="nav-item"><a class="nav-link" href="#canceled" aria-controls="canceled" role="tab" data-toggle="tab">Canceled</a></li>

                        </ul>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div role="tabpanel" class="tab-pane active" id="pending">
                          <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 20% ">Name</th>
                                            <th style="width: 20% ">Email</th>
                                            <th style="width: 20% ">Amount</th>
                                            <th style="width: 20% ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Pendingrequests as $request)
                                        <tr>
                                            <td>{{ $request->customer->name }}</td>
                                            <td>{{ $request->stripe_email }}</td>
                                            <td>{{ $request->price }}</td>
                                            <td><a class="btn btn-primary" href="{{route('request-approve',['cus',base64_encode($request->id)])}}">Approved</a>
                                                <a class="btn btn-danger" href="{{route('request-cancel',['cus',base64_encode($request->id)])}}">Cancel</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="approved">
                          <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 20% ">Name</th>
                                            <th style="width: 20% ">Email</th>
                                            <th style="width: 20% ">Amount</th>
                                            <!-- <th style="width: 20% ">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Approvedrequests as $request)
                                        <tr>
                                            <td>{{ $request->customer->name }}</td>
                                            <td>{{ $request->stripe_email }}</td>
                                            <td>{{ $request->price }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="canceled">

                          <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 20% ">Name</th>
                                            <th style="width: 20% ">Email</th>
                                            <th style="width: 20% ">Amount</th>
                                            <!-- <th style="width: 20% ">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Cancelledrequest as $request)
                                        <tr>
                                            <td>{{ $request->customer->name }}</td>
                                            <td>{{ $request->stripe_email }}</td>
                                            <td>{{ $request->price }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<!-- end row -->
</div>
<!-- end container-fluid -->
@endsection
