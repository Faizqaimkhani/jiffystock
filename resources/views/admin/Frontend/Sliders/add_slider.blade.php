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

                    <form action="/frontend-slider" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="">Heading</label>
                                <input type="text" class="form-control" required name="heading">
                            </div>
                            <div class="col">
                                <label for="">Short Text</label>
                                <input type="text" class="form-control" required name="text">
                            </div>
                        </div>
                        <!-- <div class="mt-4 row">
                            <div class="col">
                                <label for="">User</label>
                                <select name="user" class="form-control" id="users" required>
                                    <option value="">--Select--</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Product</label>
                                <select name="product_id" class="form-control" id="products" required>
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="row mt-4">
                        <div class="col">
                                <label for="">Image</label>
                                <input type="file" class="form-control" required name="image">
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
