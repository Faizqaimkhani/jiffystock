@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'package_prices','namePage' => 'Jiffystock Package Prices Management'])

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
              <h4 class="card-title">Package Prices</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                          <a href="/add-package-price/create" class="btn btn-primary">Add Package Price</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 50%">Name</th>
                            <th style="width: 15%">Product Duration Days</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prices as $price)
                            <tr>
                                <td>{{ $price->name }}</td>
                                <td>{{ $price->duration_in_days }}</td>
                                <td>{{ $price->price }}</td>
                                <td class="d-flex"><a class="btn btn-primary" href="/add-package-price/{{ $price->id }}/edit"> <i class="fa fa-edit"></i> </a>
                                    <form action="/add-package-price/{{ $price->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                            </td>
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
