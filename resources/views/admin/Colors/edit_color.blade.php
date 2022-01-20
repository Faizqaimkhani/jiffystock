@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Edit Color'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="container">

              <div class="card-title">
                <h3>Edit Color</h3>
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
                <form action="/colors/{{ $color->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col mt-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{ $color->name }}" required name="name">
                    </div>
                    <div class="col">
                        <p for="" class="text-danger">Insert color code like (#2a753a) to show the color</p>
                            <label for="">Code</label>
                            <input type="text" class="form-control" value="{{ $color->code }}" required name="code">
                    </div>
                </div>
                <div class="mt-4 mb-2">
                    <button class="btn btn-primary">Submit</button>
                    <a href="/colors" class="btn btn-warning">Cancel</a>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
