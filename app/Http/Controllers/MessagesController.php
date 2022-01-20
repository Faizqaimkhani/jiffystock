<?php

namespace App\Http\Controllers;

use App\Lib\PusherFactory;
use App\Models\Message;
use App\Models\Message as ModelsMessage;

use Illuminate\Http\Request;
use Illuminate\Mail\Message as MailMessage;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
       
    }


    /**
     * getLoadLatestMessages
     *
     *
     * @param Request $request
     */
    public function getLoadLatestMessages(Request $request)
    {
       
        if(!$request->user_id) {
            
            return;
        }
      
        $messages = ModelsMessage::where(function($query) use ($request) {
            $query->where('from_user', auth('customer')->id())->where('to_user', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->user_id)->where('to_user',  auth('customer')->id());
        })->latest()->take(10)->orderby('created_at','DESC')->get()->reverse();

        $return = [];

        foreach ($messages as $message) {
            ModelsMessage::whereId($message->id)->update(['status'=>1]);
            $return[] = view('message-line')->with('message', $message)->render();
        }


        return response()->json(['state' => 1, 'messages' => $return]);
    }
    /**
     * postSendMessage
     *
     * @param Request $request
     */
    public function postSendMessage(Request $request)
    {
        if(!$request->to_user || !$request->message) {
            return;
        }

        $message = new ModelsMessage();
        
        $message->from_user = auth('customer')->id();
        $message->to_user = $request->to_user;
        $message->content = $request->message;
        $message->status = 0;
        $message->sender=1; //1 is for customer
        $message->save();
        
        
        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateHumanReadable = $message->created_at->diffForHumans();
        $message->fromUserName = $message->fromCustomer->name;
        $message->from_user_id = Auth('customer')->id();
        $message->toUserName = $message->toUser->name;
        $message->to_user_id = $request->to_user;
        PusherFactory::make()->trigger('chat', 'send', ['data' => $message]);

        return response()->json(['state' => 1, 'data' => $message]);
    }
    /**
     * getOldMessages
     *
     * we will fetch the old messages using the last sent id from the request
     * by querying the created at date
     *
     * @param Request $request
     */
    public function getOldMessages(Request $request)
    {
        if(!$request->old_message_id || !$request->to_user)
            return;

        $message = Message::find($request->old_message_id);

        $lastMessages = Message::where(function($query) use ($request, $message) {
            $query->where('from_user',  Auth('customer')->id())
                ->where('to_user', $request->to_user)
                ->where('created_at', '<', $message->created_at);
        })
            ->orWhere(function ($query) use ($request, $message) {
            $query->where('from_user', $request->to_user)
                ->where('to_user', Auth('customer')->id())
                ->where('created_at', '<', $message->created_at);
        })
            ->orderBy('created_at', 'ASC')->limit(10)->get();

        $return = [];

        if($lastMessages->count() > 0) {

            foreach ($lastMessages as $message) {

                $return[] = view('message-line')->with('message', $message)->render();
            }

            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }

        return response()->json(['state' => 1, 'data' => $return]);
    }
   
   
//    showing sller the request of customer
   
    public function toSeller(){
        
        $users = Message::where('to_user', Auth()->id())->get()->unique('from_user');
        $unread = Message::where('to_user', Auth()->id())->where('status',0)->get()->unique('from_user')->count();
   
        return view('admin.request', compact('users','unread'));
    }
    public function toCustomer(){
        $users = Message::where('from_user', Auth('customer')->id())->get()->unique('to_user');
       
        return view('customer.request', compact('users'));
    }
    public function getLoadLatestMessagesSeller(Request $request)
    {
       
        if(!$request->user_id) {
            
            return;
        }
      
        $messages = ModelsMessage::where(function($query) use ($request) {
            $query->where('from_user', auth()->id())->where('to_user', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->user_id)->where('to_user',  auth()->id());
        })->orderBy('created_at', 'ASC')->limit(10)->get();
       
        $return = [];

        foreach ($messages as $message) {
            ModelsMessage::whereId($message->id)->update(['status'=>1]);
            $return[] = view('admin.message-line')->with('message', $message)->render();
        }


        return response()->json(['state' => 1, 'messages' => $return]);
    }
    public function postSendMessageUser(Request $request)
    {
        if(!$request->to_user || !$request->message) {
            return;
        }

        $message = new ModelsMessage();
        
        $message->from_user = auth()->id();
        $message->to_user = $request->to_user;
        $message->content = $request->message;
        $message->status = 0;
        $message->sender=0; //0 is for seller
        $message->save();

     
        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateHumanReadable = $message->created_at->diffForHumans();
        $message->fromUserName = $message->fromUser->name;
        $message->from_user_id = Auth()->id();
        $message->toUserName = $message->toCustomer->name;
        $message->to_user_id = $request->to_user;
        PusherFactory::make()->trigger('chat', 'send', ['data' => $message]);

        return response()->json(['state' => 1, 'data' => $message]);
    }
    public function getOldMessagesUser(Request $request)
    {
        if(!$request->old_message_id || !$request->to_user)
            return;

        $message = Message::find($request->old_message_id);

        $lastMessages = Message::where(function($query) use ($request, $message) {
            $query->where('from_user', Auth::user()->id)
                ->where('to_user', $request->to_user)
                ->where('created_at', '<', $message->created_at);
        })
            ->orWhere(function ($query) use ($request, $message) {
            $query->where('from_user', $request->to_user)
                ->where('to_user', Auth::user()->id)
                ->where('created_at', '<', $message->created_at);
        })
            ->orderBy('created_at', 'ASC')->limit(10)->get();

        $return = [];

        if($lastMessages->count() > 0) {

            foreach ($lastMessages as $message) {

                $return[] = view('message-line')->with('message', $message)->render();
            }

            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }

        return response()->json(['state' => 1, 'data' => $return]);
    }
}