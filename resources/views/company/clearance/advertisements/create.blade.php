<style>
    #circle {
        border-radius: 50%;
        border-color: black;
        width: 30px;
        height: 30px;
    }

</style>
@extends('company.layouts.app')
@include('company.layouts.clearance-sidebar',['activePage' => 'advertisement'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Clearance Add Advertisement"])
  <div class="panel-header panel-header-sm">
   </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
              <div class="container">

              <div class="card-header">
                <div class="card-title">
                  <h3>Create Advertisement</h3>
                </div>
              </div>

                <div class="card-body">

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

                    <form action="{{ route('clearance.advertisement.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="">Text</label>
                                <input type="text" class="form-control" required name="text">
                            </div>
                            <div class="col">
                                <label for="">Package</label>
                                <select name="package" class="form-control" id="package" required>
                                    <option value="">--Select--</option>
                                    @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }} (${{$package->price}})</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Image </label>
                                <input type="file" class="form-control" required name="image">
                            </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Request</button>
                            <a href="/products" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                  </div>
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
