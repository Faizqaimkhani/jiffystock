@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'cities','namePage' => 'Jiffystock City Management'])

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
              <h4 class="card-title"> Cites</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                  <a href="/city/create" class="btn btn-primary">Add City</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 40%">Name</th>
                                        <th style="width: 40%">Country</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ $city->country->name}}</td>
                                            <td><a href="/city/{{ $city->id }}/edit">Edit</a></td>
                                            <td>
                                                <form action="/city/{{ $city->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-primary">Delete</button>
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
