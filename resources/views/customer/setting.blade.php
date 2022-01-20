@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'setting','namePage' => 'Jiffystock Customer Settings'])

@section('content')
<div class="panel-header panel-header-sn">
</div>
<div class="content ">
  <div class="row">

    <div class="card col-md-12 rounded">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h2 class="h3">Buyer Setting</h2>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session()->get('success') }}
        </div>
        @endif
      </div>
      <div class="card-body">
      <form action="{{route('setting.save',$item->id)}}" method="POST">
            @csrf
        <div class="row">

          <div class="form-group col-md-6">
            <label for="name">Name </label>
            <input type="text" class="form-control" name="name" value="{{$item->name}}">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email </label>
            <input type="email" class="form-control" name="email" value="{{$item->email}}">
          </div>
          <div class="form-group col-md-6">
            <label for="company">Company </label>
            <input type="text" class="form-control" name="company" value="{{$item->company}}">
          </div>
          <div class="form-group col-md-6">
            <label for="category">Category </label>
            <select name="category" class="form-control" id="category">
              @foreach($cats as $cat)
              <option value="{{$cat->id}}" {{$cat->id == $item->category_id?"selected":""  }}>{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="country">Country </label>
            <select name="country" class="form-control" id="category">
              @foreach($cons as $con)
              <option value="{{$con->id}}" {{$con->id == $item->country?"selected":""  }}>{{$con->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="city">Category </label>
            <select name="city" class="form-control" id="category">
              @foreach($citys as $city)
              <option value="{{$city->id}}" {{$city->id == $item->city?"selected":""  }}>{{$city->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn btn-success ml-4" >
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="row">

<div class="card col-md-12 rounded">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h2 class="h3">Change Passowrd</h2>
    @if(session()->has('successpass'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('successpass') }}
    </div>
    @endif
  </div>
  <div class="card-body">
 <div class="col-lg-6 mb-30">
        <div class="create_wrapper mw-100">

            <form class="create_ticket_form row mb-30-none" method="POST" action="{!! route('password.save',$item->id) !!}">
                @csrf
                <div class="create_form_group col-sm-12">
                    <label for="old_pass">Old Passowrd:</label>
                    <input type="password" id="old_pass" class="form-control"  name="old_password" placeholder="Enter your Old Password">
                </div>
                <div class="create_form_group col-sm-12">
                    <label for="new_pass">New password::</label>
                    <input type="password" id="new_pass" name="password" class="form-control" placeholder="Enter your new password:">
                </div>
                <div class="create_form_group col-sm-12">
                    <label for="repeat_pass">Repeat the new password::</label>
                    <input type="password" id="repeat_pass" class="form-control" name="password_confirmation" placeholder="Repeat your new password:">
                </div>
                <div class="create_form_group col-sm-6 align-self-end">
                    <button type="submit" class="custom-button border-0 btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

</div>
</div>

@endsection
