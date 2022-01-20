@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'suppliers','namePage' => 'Jiffystock Supplier Management'])

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
              <h4 class="card-title">Suppliers</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                        <tr>
                            <th style="width: 10%">Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 10%">Company</th>
                            <th style="width: 10%">Compant License</th>
                            <th style="width: 10%">Country</th>
                            <th style="width: 10%">City</th>
                            <th style="width: 20%">Account Verification</th>
                            <th style="width: 10%">Time</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->company }}</td>
                            <td>{{ $item->contact_number }}</td>
                            <td>
                                @if($item->country > 0)
                                {{ $item->countries->name }}
                                @endif
                            </td>
                            <td>
                                @if($item->city > 0)
                                {{ $item->cities->name }}
                                @endif
                            </td>
                            <td>
                              @if($item->badge_verification_status == 0)
                                <div class="badge badge-danger">
                                    Email Not Verified Yet
                                </div>
                              @endif
                              @if($item->badge_verification_status == 1)
                              <form action="{{route('supplier.verify',$item->id)}}" method="post">
                                  @csrf
                                  <button style="cursor:pointer" type="submit" class="badge btn-info btn-sm">Admin Account Verification Required</button>
                              </form>
                              @endif
                              @if($item->badge_verification_status == 2)
                              <form action="{{route('supplier.unverify',$item->id)}}" method="post">
                                  @csrf
                                  <button style="cursor:pointer" type="submit" class="badge btn-success btn-sm">Account Verified (click to unverify)</button>
                              </form>
                              @endif
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td class="btn-group">
                              <a href="{{ route('notification.create', $item->id) }}" class="btn btn-primary btn-sm btn-sm">Send Notification</a>
                              <a href="{{ route('admin.supplier.product.create', $item->id) }}" class="btn btn-primary btn-sm btn-sm">Add Product</a>
                              <a href="{{ route('admin.suppliers.services.create', $item->id) }}" class="btn btn-primary btn-sm btn-sm">Add Service</a>
                              <a href="{{ route('suppliers.add.wallet', $item->id) }}" class="btn btn-info btn-sm btn-sm">Add to Wallet</a>
                              <a href="{{ route('suppliers.add.voucher', $item->id) }}" class="btn btn-info btn-sm btn-sm">Add a Voucher</a>
                              <form action="{{route('delete_supllier',$item->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
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
