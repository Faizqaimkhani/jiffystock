@extends('layouts.dashboard')

@section('content')
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Products</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="/home"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Product
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">View Products</li>
                                            </ol>
                                        </nav>
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
                                {{-- <div class="row">
                                    <div class="col text-right">
                                <a href="/products/create" class="btn btn-primary">Add Product</a>
                                </div>
                            </div> --}}
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="display compact table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30%">Name</th>
                                                        <th style="width: 20%">Category</th>
                                                        <th style="width: 20%">Sub Category</th>
                                                        <th style="width: 10%">User</th>
                                                        <th style="width: 10%">Price</th>
                                                        <th style="width: 10%">Stock Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $p)
                                                        <tr>
                                                            <td>{{ $p->name }}</td>
                                                            <td>{{ $p->sub_category->product_category->name}}</td>
                                                            <td>{{ $p->sub_category->name}}</td>
                                                            <td>{{ $p->user->name}}</td>
                                                            <td>{{ $p->price}}</td>
                                                            <td>{{ $p->stock_quantity}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
@endsection
