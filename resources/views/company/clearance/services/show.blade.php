@extends('company.layouts.app')
@include('company.layouts.clearance-sidebar',['activePage' => 'services'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Clearance Edit Service"])
  <div class="panel-header panel-header-sm">
   </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
              <div class="container">

              <div class="card-header">
                <div class="card-title">
                  <h3>Edit Service</h3>
                </div>
              </div>

                <div class="card-body">
                  <form action="{{route('clearance.service.update')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $clearance->id }}">
                    <div class="form-group">
                      <label>Title :</label>
                      @if($errors->has('title'))
      <div class="error text-danger">{{ $errors->first('title') }}</div>
  @endif
                      <input type="text" name="title" class="form-control" value="{{$clearance->title}}">
                    </div>
                    <div class="form-group">
                      <label>Markdown :</label>
                      @if($errors->has('html_data'))
      <div class="error text-danger">{{ $errors->first('html_data') }}</div>
  @endif
                      <div id="editor">
                        <textarea name="html_data" id="html_data" class="form-control">
                            {{ $clearance->data }}
                        </textarea>
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
                      <img id="output" src="{{$clearance->thumbnail}}"/>
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
