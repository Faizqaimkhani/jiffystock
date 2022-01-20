@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'reports','namePage' => 'Jiffystock Reports Management'])

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
              <h4 class="card-title">Reports</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table">
                      <thead>
                          <tr>
                              <th style="width: 40%">Title</th>
                              <th style="width: 40%">Description</th>
                              <th style="width: 40%">Report Type</th>
                              <th style="width: 40%">Images</th>
                              <th style="width: 20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($reports as $report)
                              <tr>
                                  <td>{{ $report->title }}</td>
                                  <td>{{ $report->description }}</td>
                                  <td><span class="badge badge-primary">{{ $report->type }}</span> </td>
                                  <td><a href="{{ route('product.reports.proof', $report->id) }}" class="btn btn-info">Images</a> </td>
                                  <td>
                                    <form action="{{ route('report.terminate') }}" method="post">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $report->id }}">
                                      <button type="submit" class="btn btn-danger">Terminate {{ ucfirst($report->type)  }}</button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              {{ $reports->links() }}
                          </tr>
                      </tfoot>
                    </table>
                </div>
              </div>
          </div>
        </div>
        <!-- end container-fluid -->
@endsection
