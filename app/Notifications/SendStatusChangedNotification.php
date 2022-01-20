<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendStatusChangedNotification extends Notification
{
    use Queueable;

    private $to_status;
    private $from_status;
    private $product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($to_status, $from_status, $product)
    {
        $this->to_status = $to_status;
        $this->from_status = $from_status;
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Update on Order Status of '.$this->product.' product')
                    ->line('Shipment has changed Order Status')
                    ->line('from '.$this->from_status.' to '.$this->to_status.' of '.$this->product.'  product')
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
