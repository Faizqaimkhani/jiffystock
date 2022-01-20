@extends('new-layouts.app',['title' => 'Jiffystock - Sign in to your account ','top_bar' => 'hide'])


@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Verification Needed') }} {{ auth()->user()->name }}</div>
                <div class="card-body">
                    {{ __('thank you for verifying your email.') }}
                    {{ __('Please wait until admin verifies your email.') }}
                    {{ __('You will recieve a email in 2-4 days') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
