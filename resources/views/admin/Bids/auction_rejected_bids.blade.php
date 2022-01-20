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
                    <h1>Rejected Bids</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="/home"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Bids
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Rejected Bids</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="datatable-wrapper table-responsive">
                        <table id="datatable" class="display compact table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 40%">Customer</th>
                                    <th style="width: 20%">Bid</th>
                                    <th style="width: 20%">Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected_bids as $bids)
                                <tr>
                                    <td>{{ $bids->user->name }}</td>
                                    <td>{{ $bids->price}}</td>
                                    <td>{{ date('d/F/Y', strtotime($bids->created_at))}}</td>
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
<!-- end container-fluid -->
@endsection
