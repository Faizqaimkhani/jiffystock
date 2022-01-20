@extends('company.layouts.app')
@include('company.layouts.clearance-sidebar',['activePage' => 'services'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Clearance Add Service"])
  <div class="panel-header panel-header-sm">
   </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
              <div class="container">

              <div class="card-header">
                <div class="card-title">
                  <h3>Create Service</h3>
                </div>
              </div>

                <div class="card-body">
                  <form class="" action="{{route('clearance.service.store')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Title :</label>
                      @if($errors->has('title'))
      <div class="error text-danger">{{ $errors->first('title') }}</div>
  @endif
                      <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                      <label>Markdown :</label>
                      @if($errors->has('html_data'))
      <div class="error text-danger">{{ $errors->first('html_data') }}</div>
  @endif
                      <div id="editor">
                        <textarea name="html_data" id="html_data" class="form-control">{{old('html_data')}}</textarea>
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
    <!-- end row -->
</div>
<!-- end container-fluid -->

@endsection

@include('company.layouts.partials.service')
