@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Add to wallets'])

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
    <!-- end row -->
    <!-- begin row -->
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">
                    <div class="card-title">
                        <h3>Add To Supplier's Wallet </h3>
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
                    <form action="{{ route('suppliers.store.wallet') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="price">Price : </label>
                          <input type="number" class="form-control" name="price" required>
                          <input type="hidden" name="user_id" value="{{ request('id') }}">
                        </div>
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
<!-- end container-fluid -->
@endsection
