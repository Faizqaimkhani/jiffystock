@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'companies','namePage' => 'Jiffystock Company Management'])

@section('content')
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
              <h4 class="card-title"> Companies</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Name</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 10%">Company</th>
                                    <th style="width: 10%">License</th>
                                    <th style="width: 10%">Contact Number</th>
                                    <th style="width: 10%">Type</th>
                                    <th style="width: 10%">Country</th>
                                    <th style="width: 10%">Created_at</th>
                                    <th style="width: 30%">Account Verification</th>
                                    <th style="width: 10%">Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->company_details->name }}</td>
                                    <td>{{ $company->company_details->license }}</td>
                                    <td>{{ $company->company_details->contact_number }}</td>
                                    <td>
                                      @if($company->usertype === 'clearance-user')
                                        Clearance Agency
                                      @endif
                                      @if($company->usertype === 'shipment-user')
                                        Shipment Company
                                      @endif
                                    </td>
                                    <td>{{ $company->countries->name }}</td>
                                    <td>{{ $company->created_at->format('m-d-Y') }}</td>
                                    <td>
                                      @if($company->badge_verification_status == 0)
                                        <div class="badge badge-danger">
                                            Email Not Verified Yet
                                        </div>
                                      @endif
                                      @if($company->badge_verification_status == 1)
                                      <form action="{{route('company.verify',$company->id)}}" method="post">
                                          @csrf
                                          <button style="cursor:pointer" type="submit" class="badge btn-info btn-sm">Admin Account Verification Required</button>
                                      </form>
                                      @endif
                                      @if($company->badge_verification_status == 2)
                                      <form action="{{route('company.unverify',$company->id)}}" method="post">
                                          @csrf
                                          <button style="cursor:pointer" type="submit" class="badge btn-success btn-sm">Account Verified (click to unverify)</button>
                                      </form>
                                      @endif
                                    </td>
                                    <td class="btn-group">
                                      <a href="{{ route('notification.create', $company->id) }}" class="btn btn-primary btn-sm btn-sm">Send Notification</a>
                                        <form action="{{route('delete_buyyer',$company->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </tfoot>
                          </table>
            </div>
          </div>
      </div>
</div>
<!-- end container-fluid -->
@endsection
