@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Add City'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>

  <div class="row">
      <div class="col-md-12">
          <div class="card card-statistics">
              <div class="card-body">
                <div class="container">

                <div class="card-title">
                  <h3>Add City</h3>
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

                  <form action="/city" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                      <div class="col">
                              <label for="">Name</label>
                              <input type="text" class="form-control" required name="name">
                      </div>
                      <div class="col">
                              <label for="">Country</label>
                              <select name="country" class="form-control" id="" required>
                                  <option value="">--Select--</option>
                                  @foreach ($countries as $country)
                                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                  </div>
                  <div class="mt-4 mb-2">
                      <button class="btn btn-primary">Submit</button>
                      <a href="/city" class="btn btn-warning">Cancel</a>
                  </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
