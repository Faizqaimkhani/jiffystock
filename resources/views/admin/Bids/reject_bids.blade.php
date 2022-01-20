@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_rejected_bids','namePage' => 'Jiffystock Rejected Bids'])

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
              <h4 class="card-title">Rejected Bids</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 40%">Product</th>
                            <th style="width: 20%">Quantity</th>
                            <th style="width: 20%">Minimum Bid</th>
                            <th style="width: 20%">Bids</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $auction = 0; @endphp
                        @foreach ($reject_bids as $bids)
                        @if ($bids->auction->id != $auction)
                        <tr>
                            <td>{{ $bids->products->name }}</td>
                            <td>{{ $bids->auction->quantity }}</td>
                            <td>{{ $bids->auction->min_bid}}</td>
                            <td><a href="/all-rejected-bids/{{ $bids->auction->id }}">Show All</a></td>
                        </tr>
                        @php $auction = $bids->auction->id @endphp
                        @endif
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
