@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'buyers','namePage' => 'Jiffystock Buyer Management'])

@section('content')
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
              <h4 class="card-title"> Buyers </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                                <tr>
                                    <th style="width: 30%">Name</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 20%">Company</th>
                                    <th style="width: 10%">Number</th>
                                    <th style="width: 10%">Country</th>
                                    <th style="width: 10%">City</th>
                                    <th style="width: 10%">Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->contact_number }}</td>
                                    <td>{{ $item->country }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="btn-group">
                                      <a href="{{ route('notification.customer.create', $item->id) }}" class="btn btn-primary btn-sm btn-sm">Send Notification</a>
                                        <form action="{{route('delete_buyyer',$item->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
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

              <!-- end row -->
            </div>
          </div>
          </div>
            </div>
          <!-- end container-fluid -->
@endsection
