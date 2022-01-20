@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'categories','namePage' => 'Jiffystock Categories Management'])

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
              <h4 class="card-title"> Categories</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                  <a href="/products-category/create" class="btn btn-primary">Add Category</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                      <thead>
                          <tr>
                              <th style="width: 40%">Name</th>
                              <th style="width: 40%">Icon</th>
                              <th style="width: 20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($p_categories as $category)
                              <tr>
                                  <td>{{ $category->name }}</td>
                                  <td>
                                    <i class="{{ $category->icon }}"></i>
                                  </td>
                                  <td><a href="/products-category/{{ $category->id }}/edit">Edit</a></td>
                                  <td>
                                      <form action="/products-category/{{ $category->id }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-primary btn-sm">Delete</button>
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
