@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'cities','namePage' => 'Jiffystock Advertisement Management'])

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
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="card-header">
                    <h4 class="card-title"> Auctions</h4>
                  </div>
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col text-right">
                            <a href="/Advertisement/create" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>
                      </div>
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
                                        <img class="add-image" src="{{ asset('storage/uploads/Advertisement-Images/' .  $p->image) }}" />
                                    </td>
                                    <td>{{ $p->text}}</td>
                                    <td>{{ $p->user->name}}</td>
                                    <td>{{ $p->package->name}}</td>
                                    <td>{{ $p->package->duration_in_days}}</td>
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
                                    <a class="btn btn-primary" href="/Advertisement/{{ $p->id }}/edit"><i class="fas fa-edit"></i></a>
                                        <form action="/Advertisement/{{ $p->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class='btn btn-danger' type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
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
      </div>
    </div>
    <!-- end row -->
@endsection
