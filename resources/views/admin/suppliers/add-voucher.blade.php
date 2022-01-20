@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Give Supplier Voucher'])

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
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">
                    <div class="card-title">
                      <h3>Give Supplier Voucher</h3>
                    </div>
                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="list-unstyled" style="color: red">
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('suppliers.store.voucher') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="price">Voucher Name : </label>
                          <input type="text" class="form-control" name="name" required placeholder="Voucher Name">
                        </div>
                        <div class="form-group">
                          <label for="price">Discounted Price : </label>
                          <input type="number" class="form-control" name="discounted_price" required placeholder="Discounted Price">
                        </div>
                        <div class="form-group">
                          <label for="price">Times to Use : </label>
                          <input type="number" class="form-control" name="times_to_use" required placeholder="Number of Times to use this coupon">
                        </div>
                        <input type="hidden" name="user_id" value="{{ request('id') }}">
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
