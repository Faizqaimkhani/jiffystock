@extends('company.layouts.app')
@include('company.layouts.clearance-sidebar',['activePage' => 'services'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Clearance Services"])
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                      <h4 class="card-title">Clearance Services Management</h4>

                    <div class="datatable-wrapper table-responsive">
                      <form action="">
                        <label>Search : </label>
                        <input type="text" name="search" class="form-control w-25" value="{{ request()->search }}" placeholder="search">
                        <button type="submit" name="button" class="btn btn-sm btn-info">Search</button>
                      </form>
                      <div class="text-right">
                        <a href="{{route('clearance.service.create')}}" class="btn btn-info">Create Service</a>
                      </div>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 20% ">Title</th>
                                    <th style="width: 10% ">Thumbnail</th>
                                    <th style="width: 20% ">Created On</th>
                                    <th style="width: 20% ">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($services as $service)
                                <tr>
                                  <td>{{ $service->title }}</td>
                                  <td>
                                    <img src="{{ $service->thumbnail }}" class="w-40 h-40">
                                  </td>
                                  <td>{{ $service->created_at }}</td>
                                  <td>
                                    <div class="btn-group">
                                      <form action="{{route('clearance.service.delete')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$service->id}}">
                                        <button type="submit" name="button" class="text-white btn bg-danger px-2 border-0 rounded " >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg></button>
                                      </form>
                                        <a href="{{route('clearance.service.show',$service->id)}}" type="submit" name="button" class="text-white btn bg-info px-2 border-0 rounded " >
                                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
                                        </a>
                                    </div>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->

@endsection
