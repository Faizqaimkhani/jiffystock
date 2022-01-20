@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Edit Sub Category'])

@section('service_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('new-frontend/css/font-awesome-browser.css') }}">
@endsection

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="container">

              <div class="card-title">
                <h3>Edit Sub Category</h3>
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
                      <form action="/products-sub-category/{{ $sub_category->id }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="row">
                          <div class="col">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" value="{{ $sub_category->name }}" required name="name">
                          </div>
                          <div class="col">
                                  <label for="">Category</label>
                                  <select name="category" class="form-control" id="" required>
                                      <option value="{{ $sub_category->product_category->id }}">{{ $sub_category->product_category->name }}</option>
                                      @foreach ($categories as $category)
                                          @if ($sub_category->product_category->id != $category->id)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                          </div>
                          <div class="col">
                            <label for="icon">Select Icon</label>
                            <input type="text" placeholder="Select icon" name="icon" class="form-control" value="{{ $sub_category->icon }}" data-fa-browser />
                          </div>
                      </div>
                      <div class="mt-4 mb-2">
                          <button class="btn btn-primary">Submit</button>
                          <a href="/products-sub-category" class="btn btn-warning">Cancel</a>
                      </div>
                      </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('new-frontend/js/font-awesome-browser.js') }}">

</script>
<script type="text/javascript">
  $(function($) {
    $.fabrowser();
  })
</script>
@endpush
