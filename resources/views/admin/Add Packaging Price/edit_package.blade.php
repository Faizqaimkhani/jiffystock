@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Create Package Price'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
  <div class="row">
      <div class="col-md-12">
          <div class="card card-statistics">
              <div class="card-body">
                <div class="container">

                <div class="card-title">
                  <h3>Edit Package Price</h3>
                </div>
              @if ($errors->any())
                  <div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li style="color: red">
                                  {{ $error }}
                              </li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action="/add-package-price/{{ $prices->id }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                  <div class="col">
                          <label for="">Name</label>
                          <input type="text" class="form-control" value="{{ $prices->name }}" required name="name">
                  </div>
                  <div class="col">
                          <label for="">Duration In Days</label>
                          <input type="number" class="form-control" value="{{ $prices->duration_in_days }}" required name="days">
                  </div>
                  <div class="col">
                          <label for="">Name</label>
                          <input type="number" class="form-control" value="{{ $prices->price }}" required name="price">
                  </div>
              </div>
              <div class="mt-4 mb-2">
                  <button class="btn btn-primary">Submit</button>
                  <a href="/home" class="btn btn-warning">Cancel</a>
              </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
