@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'sliders','namePage' => 'Jiffystock Slider Management'])

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
              <h4 class="card-title"> Sliders</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col text-right">
                  <a href="/frontend-slider/create" class="btn btn-primary">Add Slider</a>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 30%">Image</th>
                            <th style="width: 20%">Heading</th>
                            <th style="width: 20%">Text</th>

                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td><img src="{{ asset('storage/uploads/Sliders-Images/' . $slider->image) }}" style="width: 100px; height: 50px" alt="Slider-Image" srcset=""></td>
                                <td>{{ $slider->heading }}</td>
                                <td>{{ $slider->text }}</td>

                                <td><a href="/frontend-slider/{{ $slider->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <form action="/frontend-slider/{{ $slider->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
