@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'products','namePage' => 'Jiffystock Products Management'])

@section('content')
<!-- begin container-fluid -->
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
              <h4 class="card-title"> Products</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Name</th>
                                    <th style="width: 20%">Category</th>
                                    <th style="width: 20%">Sub Category</th>
                                    <th style="width: 10%">User</th>
                                    <th style="width: 10%">Price</th>
                                    <th style="width: 10%">Stock Quantity</th>
                                    <th style="width: 10%">Featured</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $p)
                                @if($p->user)
                                  <tr>
                                      <td>{{ $p->name }}</td>
                                      <td>{{ $p->sub_category->product_category->name}}</td>
                                      <td>{{ $p->sub_category->name}}</td>
                                      <td>{{ $p->user->name}}</td>
                                      <td>{{ $p->price}}</td>
                                      <td>{{ $p->stock_quantity}}</td>
                                      <td>
                                          <input type="hidden" class="pid" value="{{$p->id}}">
                                          <button class="btn btn-primary {{isset($p->featured)==1?'d-none':'' }} add-featured" data-id="{{$p->id}}" >Add</button>
                                          <button class="btn btn-danger {{isset($p->featured)==0?'d-none':'' }}  remove-featured " data-id="{{$p->id}}">Remove</button></td>
                                  </tr>
                                  @endif
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
              </div>
            </div>
            <!-- end container-fluid -->
<!-- end container-fluid -->
@endsection

@push('js')
<script>
    $(".add-featured").on('click',function(){
        el = $(this).closest('td');
        removebutton=el.find('.remove-featured');
        addbutton=el.find('.add-featured');
        id =el.find('.pid').val();
        $.ajax({
           type:'POST',
           url:'/featured',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data:{"featured":"1", "productid":id},
           success:function(data){
               if(data.status == 200){
                //toastr.success(data.message);
                addbutton.addClass('d-none');
                 removebutton.removeClass('d-none');
               }


           }
        });



    });
    $(".remove-featured").on('click',function(){
        el = $(this).closest('td');
        removebutton=el.find('.remove-featured');
        addbutton=el.find('.add-featured');
        id =el.find('.pid').val();
        
        $.ajax({
           type:'POST',
           url:'/featured',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data:{"featured":0, "productid":id},
           success:function(data){
               if(data.status == 200){
                //toastr.error(data.message);
                removebutton.addClass('d-none');
        addbutton.removeClass('d-none');
               }


           }
        });

    })

</script>

@endpush
