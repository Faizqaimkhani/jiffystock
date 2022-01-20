@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'reports','namePage' => 'Jiffystock Report Proof Management'])

@section('content')
<!-- begin container-fluid -->

    <div class="panel-header panel-header-sm">
    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Report Proof</h4>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                @php
                $i = 0;
                @endphp
                @foreach($images as $image)
                <h4>Image {{ ++$i }}</h4>
                  <img src="{{ $image->image }}" alt="">
                @endforeach
              </div>
          </div>
        </div>
        <!-- end container-fluid -->
@endsection
