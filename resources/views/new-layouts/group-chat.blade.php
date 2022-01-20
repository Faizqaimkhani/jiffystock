@extends('new-layouts.dashboard.layouts.app',['activePage' => 'chat','namePage' => 'Conversation','top_bar' => 'hide'])
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
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="main">
    @if(session()->has('message'))
      <div class="alert alert-primary w-100 text-center">
        <p class="text-white h5">{{ session()->get('message') }}</p>
      </div>
    @endif
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
                <h3>You are not added to any groups yet !</h3>
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
                    <div class="chat-screen-header-left-username">
                      @if($user_type == 'customer')
                      <button class="btn addClearence" style="color: #fff;background-color: #f96332;border-color: #fe5923;"  data-toggle="modal" data-target="#clearence_modal" onclick="initSelect2()">Add Clearance Company</button>
                      <button class="btn removeClearence" data-type="clearance" style="color: #fff;background-color: #f96332;border-color: #fe5923;" id="removeMember">Remove Current Clearance Company</button>
                       
                      <button class="btn addShipment" style="color: #fff;background-color: #f96332;border-color: #fe5923;"  data-toggle="modal" data-target="#shipments" onclick="initSelect2()">Add Shipments Company</button>
                        <button class="btn removeShipment" data-type="shipment" style="color: #fff;background-color: #f96332;border-color: #fe5923;" id="removeMember">Remove Current Shipments</button>
                      @endif
                      @if($user_type == 'supplier')
                        <a href="" class="btn order_btn" style="color: #fff;background-color: #f96332;border-color: #fe5923;" >Order</a>
                      @endif
                    </div>
                </div>
            </div>
            <div class="chat-screen-body" id="chatScreenBody">
                <div class="home-screen-fav">
                    <label for="">Chat Members</label>
                    <div class="home-screen-fav-row" id="chatMembers">

                    </div>
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
@if($user_type == 'customer')
  <div class="modal fade" id="shipments" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Shipment Company In Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="form-group">
            <label for="shipment">Select Shipment : </label>
            <select class="form-control select2" id="shipment_id" required>
              <option selected disabled hidden>Select Shipment</option>
              @foreach($shipments as $shipment)
                <option value="{{ $shipment->id }}">{{ $shipment->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-type="shipment_id" id="addMember">Add</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="clearence_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Clearence Company In Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="form-group">
            <label for="shipment">Select Clearence Company : </label>
            <select class="form-control select2" id="clearence_id" required>
              <option selected disabled hidden>Select Clearence</option>
              @foreach($clearences as $clearence)
                <option value="{{ $clearence->id }}">{{ $clearence->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-type="clearence_id" id="addMember">Add</button>
        </div>
      </div>
    </div>
  </div>
@endif
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('new-frontend/js/chat.js') }}"></script>
<script type="text/javascript">
  window.addEventListener('load', function () {
    initializeChat('@json($groups)');
  })
</script>
  @if($user_type == 'supplier')
    <script type="text/javascript">
      let order = document.querySelector('.order_btn');
      let scope = this;
      order.addEventListener('click', function(){
        this.href = "{{ url('') }}/orders/create/"+scope.getGroupId();
      });
    </script>
  @endif

  @if($user_type == 'customer')
    <script type="text/javascript">

        function toggleBtn() {
          let shipment_status = getGroupShipmentStatus();
          let clearence_status = getGroupHasClearenceStatus();

          $('.addShipment').hide();
          $('.removeShipment').hide();

          $('.addClearence').hide();
          $('.removeClearence').hide();

          if(shipment_status == true)
          {
            $('.addShipment').hide();
            $('.removeShipment').show();
          }
          if(shipment_status == false)
          {
            $('.addShipment').show();
            $('.removeShipment').hide();
          }

          if(clearence_status == true)
          {
            $('.addClearence').hide();
            $('.removeClearence').show();
          }
          if(clearence_status == false)
          {
            $('.addClearence').show();
            $('.removeClearence').hide();
          }
          
        }
    </script>
    <script type="text/javascript" src="{{ asset('new-frontend/js/select2.js') }}" defer></script>
    <script>
        function initSelect2() {
          $('.select2').select2();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','#addMember',function(e) {
          
          e.preventDefault()
          let scope = this;
          let company_user_id = $('#' + $(this).attr('data-type') ).val();
          if(!company_user_id) {
            showNotification('Error', "Select a Company", 'danger');
            return;
          }
          let group_id = getGroupId();

        	$.ajax({
        		url:'/customer/group/add-member',
        		method: "POST",
            beforeSend: function() {
              $('#shipments').modal('hide');
              $('#clearence_modal').modal('hide');
              $('.close').click();
            },
        		data : {
        			'id' : company_user_id,
        			'group_id' : group_id,
        		},
        		success:function(data) {
              if(data.status == true){
                showNotification('Success', data.message,'success');
                if(data.company_type == 'shipment'){
                 setGroupShipmentStatus(true);
                }
                else if(data.company_type == 'clearence'){
                  setGroupHasClearenceStatus(true);
                }
                updateMembers()
              }else{
                showNotification('Info', data.message,'info');
              }
        		},
            error:function(err){
              showNotification('Error', 'Something went wrong, Try agian','danger');
            }
        	});
        })
      </script>
    <script type="text/javascript">
      $(document).on('click','#removeMember',function(e) {
        let group_id = getGroupId();
        let company = $(this).attr('data-type');

        $.ajax({
          url:'/customer/group/remove-member',
          method: "POST",
          beforeSend: function() {
            $('#shipments').modal('hide');
            $('#clearence_modal').modal('hide');
            $('.close').click();
          },
          data : {
            'group_id' : group_id,
            'company' : company,
          },
          success:function(data) {
            if(data.status == true){
              showNotification('Success', data.message,'success');
              if(data.company_type == 'shipment'){
                 setGroupShipmentStatus(false);
                }
                else if(data.company_type == 'clearence'){
                  setGroupHasClearenceStatus(false);
                }
              updateMembers()
            }else{
              showNotification('Info', data.message,'info');
            }
          },
          error:function(err){
            showNotification('Error', 'Something went wrong, Try agian','danger');
          }
        });
      })
      </script>
  @else
    <script type="text/javascript">
      function toggleBtn(){
        //
      }
    </script>
  @endif
@endpush
