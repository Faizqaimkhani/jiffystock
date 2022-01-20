@extends('layouts.'.$dashboard)

@section('content')
<!-- begin container-fluid -->
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Customer Review</h1>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                    @if (!$reviews)
                    @if(Auth::guard('customer')->user())
                        <table id="datatable" class="display compact table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 80% ">Name</th>
                                    <th style="width: 20% ">Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_products as $product)
                                <tr>
                                    <td>{{ $product->product->name }}</td>
                                    <td>
                    <button data-toggle="modal" data-target="#reviewModal" class="btn btn-primary btn-lg">Submit Review
                        Now</button>
                                    </td>

    {{-- Review modal --}}
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <form action="{{route('submit-review')}}" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Review For {{$product->product->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <input type="hidden" name="user_id" value="{{$order->user_id}}">
                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                    <div class="form-group">
                      <label for="">Rating</label>
                    <input type="number" name="rating" min="1" max="5" id="" class="form-control" placeholder="Enter your Rating" required>
                    </div>
                    <div class="form-group">
                      <label for="">Review</label>
                        <textarea name="review" id="" cols="5" rows="5" class="form-control" required placeholder="Enter your Review"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <h5>Customer did not do review on that order yet</h5>
                    @endif
                    @else
                    @php $r_count = 0; @endphp
                    @foreach ($reviews as $review)
                    @if ($r_count > 0)
                    <div class="mt-5">
                    @endif
                    <h4>Product : <span>{{$review->product->name}}</span></h4>
                    <h5>Rating : <span>{{$review->rating}}</span></h5>
                    <h6>Review : <span>{{$review->review}}</span></h6>
                    @if ($r_count > 0)
                    </div>
                    @endif
                    @php $r_count++; @endphp
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->

@endsection
