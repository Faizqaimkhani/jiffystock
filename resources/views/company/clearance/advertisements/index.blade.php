@extends('company.layouts.app')
@include('company.layouts.clearance-sidebar',['activePage' => 'advertisement'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Clearance Advertisement"])
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
                  <h4 class="card-title">Clearance Advertisement Management</h4>

                  <!-- <form action="">
                    <input type="text" name="search" class="form-control w-25" value="{{ request()->search }}" placeholder="search">
                    <button type="submit" name="button" class="btn btn-sm btn-info">Search</button>
                  </form> -->
                <div class="text-right">
                  <a href="{{route('clearance.advertisement.create')}}" class="btn btn-info">Add</a>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Image</th>
                                    <th style="width: 20%">Text</th>
                                    <th style="width: 20%">Supplier Name</th>
                                    <th style="width: 10%">Package</th>
                                    <th style="width: 10%">Expire</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adds as $p)
                                <tr>
                                    <td>
                                        <img class="add-image" src="{{ asset('storage/uploads/clearance/advertisement-images/' .  $p->image) }}" />
                                    </td>
                                    <td>{{ $p->text}}</td>
                                    <td>{{ $p->user->name}}</td>
                                    <td>{{ $p->package->name}}</td>
                                    <td>{{ $p->package->duration_in_days}} day left</td>
                                    <td>
                                        @if($p->status==0)
                                         {{ "Pending" }}
                                         @endif

                                         @if($p->status==1)
                                         {{ "Approved" }}
                                         @endif

                                         @if($p->status==2)
                                         {{ "rejected" }}
                                        @endif
                                        @if($p->status==3)
                                         {{ "Expired" }}
                                        @endif

                                    </td>
                                    <td>
                                    @if($p->status==0)
                                    <a class="btn btn-primary" href="{{ route('clearance.advertisement.edit',$p->id) }}"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('clearance.advertisement.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <button class='btn btn-danger' type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
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
