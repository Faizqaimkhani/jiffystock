@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Create Service'])

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
    <!-- end row -->
    <!-- begin row -->
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">
                    <div class="card-title">
                      <h3>Create Service</h3>
                    </div>
                  <form class="" action="{{route('admin.suppliers.services.store')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ request('id') }}">
                    <div class="form-group">
                      <label>Title :</label>
                      @if($errors->has('title'))
                          <div class="error text-danger">{{ $errors->first('title') }}</div>
                      @endif
                      <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                    </div>
                    <div class="form-group">
                      <label>Markdown :</label>
                      @if($errors->has('html_data'))
                          <div class="error text-danger">{{ $errors->first('html_data') }}</div>
                      @endif
                      <div id="editor">
                        <textarea name="html_data" id="html_data" class="form-control" required>{{old('html_data')}}</textarea>
                      </div>
                  </div>
                    <div class="form-group">
                      <label>Thumbnail :</label>
                      @if($errors->has('thumbnail'))
                          <div class="error text-danger">{{ $errors->first('thumbnail') }}</div>
                      @endif
                      <div class="upload-btn-wrapper ">
                        <a href="javascript:void(0)" class="btn btn-outline-info">Upload a file</a>
                        <input type="file" name="thumbnail" accept="image/*" onchange="loadFile(event)"/>
                      </div>
                      <img id="output"/>
                    </div>
                    <div class="form-group my-5">
                      <button type="submit" name="button" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                  </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->
@endsection
@include('company.layouts.partials.service')
