@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'notification','namePage' => 'Jiffystock Create Package Price'])

@section('service_css')
  <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}">
@endsection


<style media="screen">
.text-brand{
    color: #f18819;
  }
</style>

@section('content')
<div class="panel-header panel-header-sm">
 </div>
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
                                      <div class="container">

                                      <div class="card-title">
                                        <h3>Share Product</h3>
                                      </div>

                                        <div id="share" class="p-3">
                                          <a href="{{ url('/product-details'.$product->id) }}"></a>
                                        </div>
                                    </div>
                                    <div class="card-footer product-redirection">
                                        <a href="{{ url('/products') }}" class="text-brand">Go to Products</a>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- end row -->


@endsection

@push('js')
  <script src="{{ asset('js/jssocials.js') }}"></script>
  <script>
     $("#share").jsSocials({
         shares: ["twitter", "facebook", "whatsapp"]
     });
     jsSocials.shares.twitter = {
        label: "Tweet",
        logo: "fa fa-twitter",
        shareUrl: "https://twitter.com/share?url='hello-world'&text={text}&via={via}&hashtags={hashtags}",
        countUrl: "https://cdn.api.twitter.com/1/urls/count.json?url={url}&callback=?",
        getCount: function(data) {
            return data.count;
        }
    };
  </script>
@endpush
