@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Edit City'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="container">

              <div class="card-title">
                <h3>Edit City</h3>
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
                <form action="/city/{{ $city->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{ $city->name }}" required name="name">
                    </div>
                    <div class="col">
                            <label for="">Country</label>
                            <select name="country" class="form-control" id="" required>
                                <option value="{{ $city->country->id }}">{{ $city->country->name }}</option>
                                @foreach ($countries as $country)
                                    @if ($city->country_id != $country->id)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="mt-4 mb-2">
                    <button class="btn btn-primary">Submit</button>
                    <a href="/home" class="btn btn-warning">Cancel</a>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
