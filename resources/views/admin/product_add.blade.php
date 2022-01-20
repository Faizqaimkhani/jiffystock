@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'add_product','namePage' => 'Jiffystock Advertisement Product Management'])

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
              <h4 class="card-title"> Advertisement Products</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 60%">Product Name</th>
                            <th style="width: 60%">User</th>
                            <th style="width: 20%">Package</th>
                            <th style="width: 20%">Expire At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adds as $a)
                            <tr>
                                <td>{{ $a->product->name }}</td>
                                <td>{{ $a->user->name }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->expire_at }}</td>
                                {{-- <td><a href="/country/{{ $country->id }}/edit">Edit</a></td>
                                <td>
                                    <form action="/product-auction/{{ $country->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                            </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
      </div>
    </div>
    <!-- end container-fluid -->
@endsection
