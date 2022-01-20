@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'withdraw_sellers','namePage' => 'Jiffystock Admin Withdraw Sellers Management'])

@section('content')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
<style>
    #chat-overlay {
        position: unset !important;
    }
    .panel-heading {

    width: 100%;
    padding: 8px 0px 8px 7px;
}
.chat_box {
    margin-right: 0px;
    width: 100%;

}
.close-chat{
display: none;
}
.col-md-2.col-xs-2.avatar {
    text-align: center;
}
.chat-area{
    height: 75vh;
}
.card .image {
  height: 100px
}
</style>
<div class="panel-header panel-header-sm">
 </div>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-4 ">
          <div class="articles card chat-user" style="height:75vh; overflow-y:auto; scrollbar-width: thin;">

            <div class="card-header d-flex align-items-center justify-content-between">
              <h2 class="h3">Customers</h2>
              <div class="badge badge-rounded bg-green pull-right">{{$users->count()}} </div>
            </div>
            <div class="card-body no-padding">
                @foreach($users as $user)
                @if($user->sender == 1)
              <div onclick="Chatpop('{{ $user->fromCustomer->id }}','{{ $user->fromCustomer->name }}')" class="item d-flex align-items-center">
                <div class="image w-25"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text">
                    <h3 class="h5">{{$user->fromCustomer->name}} <small>(buyer)</small></h3><small>Posted on {{ $user->created_at->diffForHumans() }}.   </small></div>
              </div>
              @else
              <div onclick="Chatpop('{{ $user->fromUser->id }}','{{ $user->fromUser->name }}')" class="item d-flex align-items-center">
                <div class="image w-25"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text">
                    <h3 class="h5">{{$user->fromUser->name}} <small>(Supplier) </small></h3><small>Posted on {{ $user->created_at->diffForHumans() }}.   </small></div>
              </div>
              @endif
              @endforeach

            </div>
          </div>
        </div>

        <div class="col-lg-6">
        <input type="hidden" id="current_user" value="{{ Auth()->id()}}" />
        <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
        <input type="hidden" id="pusher_cluster" value="ap2" />
        <div id="chat-overlay" class="row "></div>
        </div>
    </div>
</div>
@include('chat-box')
  <!-- chat box css -->


@endsection

@push('js')
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script src="{{ asset('js/userchat.js') }}"></script>
@endpush
