@if($message->from_user == Auth('customer')->id() && $message->sender == 1)

    <div class="row msg_container base_sent" data-message-id="{{ $message->id }}">
        <!-- <div class="col-md-8 col-xs-9 mx-2 px-0 ml-4"> -->
            
            <div class="messages msg_sent ">
                <p>{!! $message->content !!}</p>
                <time datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ isset($message->fromCustomer->name)==true?$message->fromCustomer->name:$message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
        <!-- </div>
        <div class="col-md-2 col-xs-2  avatar">
            <img src="{{ url('images/user-avatar.png') }}"  width="30" height="30" class="img-responsive mx-auto">
        </div> -->
    </div>

@else

    <div class="row msg_container base_receive" data-message-id="{{ $message->id }}">
        <!-- <div class="col-md-2 col-xs-2 avatar">
            <img src="{{ url('images/user-avatar.png') }}" width="30" height="30" class=" img-responsive ">
        </div>
        <div class="col-md-10 col-xs-10"> -->
            <div class="messages msg_receive text-left">
                <p>{!! $message->content !!}</p>
                <time datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ isset($message->fromCustomer->name)==true?$message->fromCustomer->name:$message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
        <!-- </div> -->
    </div>

@endif