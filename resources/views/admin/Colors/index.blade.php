<style>
#circle {
    border-radius: 50%;
    border-color: black;
    width: 30px;
    height: 30px;
}
</style>
@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'colors','namePage' => 'Jiffystock Product Colors Management'])

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
              <h4 class="card-title"> Product Colors</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                  <a href="/colors/create" class="btn btn-primary">Add Color</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 30%">Name</th>
                            <th style="width: 30%">Code</th>
                            <th style="width: 20%">Color</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->code }}</td>
                                <td>
                                    <div id="circle" class="border-dark" style="background: {{$c->code}};"></div>
                                </td>
                                <td><a href="/colors/{{ $c->id }}/edit">Edit</a></td>
                                <td>
                                    <form action="/colors/{{ $c->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
