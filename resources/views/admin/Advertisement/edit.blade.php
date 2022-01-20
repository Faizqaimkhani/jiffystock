@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'cities','namePage' => 'Jiffystock Add Advertisement'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
<!-- begin container-fluid -->
<div class="content">

  <div class="row">
      <div class="col-md-12">
          <div class="card card-statistics">
              <div class="card-body">
                <div class="container">

                <div class="card-title">
                  <h3>Edit Advertisement</h3>
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
                    <form action="/Advertisement/{{ $add->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="">Text</label>
                                <input type="text" class="form-control" value="{{ $add->text }}" required
                                    name="text">
                            </div>

                            <div class="col">
                                <label for="">Package </label>
                                <select name="package_id" class="form-control" id="sub-category" required>
                                @foreach($packages as $package)
                                @if($add->pacakge_id    ==  $package->id)
                                    <option value="{{ $package->id }}" selected >{{ $package->name ." ".$package->price }}</option>
                                @else
                                <option value="{{ $package->id }}" >{{ $package->name ." ".$package->price }}</option>

                                @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{ $add->user->name }}" required
                                    name="user" readonly>
                            </div>
                            <div class="col">
                                <label for="">Duration</label>
                                <input type="text"  class="form-control" value="{{ $add->package->duration_in_days }}" required
                                    name="duration" readonly>
                            </div>
                        </div>



                        <div class="row mt-4">

                            <div class="col">
                                <label for="">Image </label>
                                <br>
                                <img src="{{ asset('storage/uploads/Advertisement-Images/' . $add->image) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image" value="{{$add->image}}">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Submit</button>
                            <a href="/Advertisement" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* When click show user */
        $('#category').change(function () {
            var category_id = $(this).val();
            var url = '{{ route("products_sub_categories", ":id") }}';
            url = url.replace(':id', category_id);

            $.get(url, function (response) {
                response = JSON.parse(response);
                data = response.data;
                console.log(data);

                $('#sub-category').empty();
                $.each(data, function (key, value) {
                    console.log(value);
                    var html = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#sub-category').append(
                        html
                    );
                });

            })
        });

    });

</script>


@endsection
