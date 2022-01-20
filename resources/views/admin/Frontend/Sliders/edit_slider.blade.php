@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Add Slider'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>

  <div class="row">
      <div class="col-md-12">
          <div class="card card-statistics">
              <div class="card-body">
                <div class="container">

                <div class="card-title">
                  <h3>Add Slider</h3>
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
                    <form action="/frontend-slider/{{ $slider->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col">
                                <label for="">Heading</label>
                                <input type="text" class="form-control" value="{{ $slider->heading }}" required name="heading">
                        </div>
                        <div class="col">
                                <label for="">Text</label>
                                <input type="text" class="form-control" value="{{ $slider->text }}" required name="text">
                        </div>
                    </div>


    <div class="row mt-4">
        <div class="col">
            <label for="">Image</label>
            <br>
            <img src="{{ asset('storage/uploads/Sliders-Images/' . $slider->image) }}"
                style="width:200px; height:200px" alt="">
            <input type="hidden" name="old_image" value="{{$slider->image}}">
            <input type="file" class="form-control" name="image">
        </div>
    </div>
                    <div class="mt-4 mb-2">
                        <button class="btn btn-primary">Submit</button>
                        <a href="/frontend-slider" class="btn btn-warning">Cancel</a>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<!-- end container-fluid -->
@endsection

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
        $('#users').change(function () {
            var user_id = $(this).val();
            var url = '{{ route("user_products", ":id") }}';
            url = url.replace(':id', user_id);

            $.get(url, function (response) {
                response = JSON.parse(response);
                data = response.data;
                console.log(data);

                $('#products').empty();
                $.each(data, function (key, value) {
                    console.log(value);
                    var html = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#products').append(
                        html
                    );
                });

            })
        });

    });

</script>
