@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Add Country'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="container">

                  <div class="card-title">
                    <h3>Add Country</h3>
                  </div>

                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/country" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col">
                                <label for="">Name</label>
                                <!-- <input type="text" class="form-control" required name="name"> -->
                                <select name="name" class="form-control" id="name">
                                    @foreach(getCountryCode('all') as $con=>$value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <button class="btn btn-primary">Submit</button>
                        <a href="/country" class="btn btn-warning">Cancel</a>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection
