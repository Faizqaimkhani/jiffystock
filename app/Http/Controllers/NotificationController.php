<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Notifications\MessagesNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        // dd(new OffersNotification($offerData));
        // Notification::send($userSchema, new OffersNotification($offerData));

        $userSchema->notify(new MessagesNotification($offerData));
        dd('Task completed!');
    }
}