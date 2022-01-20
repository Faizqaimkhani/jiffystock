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
                    <h1>Send Notification</h1>
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
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="/home"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Send Notification
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Send Notification</li>
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
                    <form action="{{ route('notification.send') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="subject">Subject : </label>
                          <input type="text" class="form-control"  value="{{old('subject')}}" name="subject" required>

                          <input type="hidden" name="user_id" value="{{ request('id') }}">
                        </div>
                        <div class="form-group">
                          <label for="subject">Body : </label>
                          <div id="editor">
                            <textarea name="body" id="html_data" class="form-control">{{old('html_data')}}</textarea>
                          </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Send</button>
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

@include('company.layouts.partials.service')
