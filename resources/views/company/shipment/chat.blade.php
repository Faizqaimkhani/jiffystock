@extends('company.layouts.app')
@include('company.layouts.shipment-sidebar',['activePage' => 'services'])


@section('service_css')
  <link rel="stylesheet" href="{{ asset('new-frontend/css/chat.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('new-frontend/css/select2.css') }}">

@endsection

@section('js')
  <script defer src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
<div id="app"></div>

<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Shipment Services"])
  <div class="panel-header panel-header-sm">
   </div>

<div class="row">
    <div class="col-lg-12">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="main">
            <div class="main-screen" id="main-scroll">
                <div id="homeScreen" class="home-screen">
                    <div class="home-screen-header">
                        <span class="back-button">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span id="search-button" class="search-button">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div class="home-screen-tabbar">
                        <span class="active">Messages</span>
                    </div>

                    <hr class="divider">

                    <div id="homeScreenMessagesBody" class="home-screen-messages">
                      @if(count($groups) < 1)
                        <h3>You are not added to any groups yet  !</h3>
                      @endif
                    </div>

                </div>
                <div id="loader"></div>
                  <div id="chatScreen" class="chat-screen">
                    <div class="chat-screen-header">
                        <div class="chat-screen-header-left">
                            <span id="chatBackbutton" class="back-button">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </span>
                            <div class="chat-screen-header-left-username"></div>
                        </div>
                    </div>
                    <div class="chat-screen-body" id="chatScreenBody">
                        <div class="home-screen-fav">
                            <label for="">Chat Members</label>
                            <div class="home-screen-fav-row" id="chatMembers"></div>
                        </div>
                        <hr class="divider">
                        <span id="msgTarget"></span>
                    </div>
                    <div class="chat-screen-footer">
                      <p class="text-warning" id="text_status"></p>
                        <div class="input">
                            <input id="message-input" placeholder="Type new message" type="text">
                            <button id="send-message">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="searchScreen" class="search-screen">
                    <div class="search-screen-header">
                        <span id="chat-back-button" class="back-button">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <input id="searchInput" onkeyup="searchMessage()" type="text" placeholder="Search" class="search-input"></input>
                    </div>
                    <div id="searchScreenBody" class="search-screen-body">
                        <div class="search-screen-body-item">
                            <img class="d-none" src="https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg" alt="">
                            <div class="search-screen-body-item-content">
                                <div class="search-screen-body-item-content-top d-none">
                                    <h4></h4>
                                    <span></span>
                                </div>
                                <div class="search-screen-body-item-content-bottom d-none">
                                    <p></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('new-frontend/js/chat.js') }}"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      initializeChat('@json($groups)');
    })
  </script>
@endpush
