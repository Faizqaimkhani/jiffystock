@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_pending_bids','namePage' => 'Jiffystock Pending Bids'])

@section('content')
<!-- begin container-fluid -->
<div class="panel-header panel-header-sm">
</div>
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
        <div class="col-lg-12">
            <div class="row">
                <div class="col text-right">
                    <a href="/end-bid/{{ $pending_bids[0]->auction->id }}" class="btn btn-primary">End Bid</a>
                </div>
            </div>
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
                                @foreach ($pending_bids as $bids)
                                <tr>
                                    <td>{{ $bids->customer->name }}</td>
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
</div>
<!-- end row -->
@endsection