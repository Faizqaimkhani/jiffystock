@extends('layouts.dashboard')

@section('content')
<!-- begin container-fluid -->
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Send Order Status</h1>
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
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="/home"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Send Order Status
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Send Order Status</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
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
                          <label for="price">Order Status : </label>
                          <select class="form-control" name="status" value="{{ $order->status }}">
                            <option value="pending">Pending</option>
                            <option value="accepted">Accepted</option>
                            <option value="approved">Approve</option>
                            <option value="reject">Reject</option>
                          </select>
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
    <!-- end row -->
</div>
<!-- end container-fluid -->
@endsection
