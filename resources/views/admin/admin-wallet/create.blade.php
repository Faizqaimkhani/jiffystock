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
                                        <h1>Add Into Wallet</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="/home"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Admin Wallet
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Insert into Admin Wallet</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-statistics">
                                    <div class="card-body">

                                        @if ($errors->any())
                                            <div>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li class="list-unstyled" style="color: red">
                                                            {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('admin.wallet.store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" name="price" placeholder="Price">
                                            </div>
                                            <div class="mt-4 mb-2">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
@endsection
