<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Proposalprice extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     * 
     */
    protected $price;
    protected $urls;
    public function __construct($price,$urls)
    {
        $this->price=$price;
        $this->urls=$urls;
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
                    ->subject('Proposal Price Notification')
                    ->line('In responce to the group booking.')
                    ->line('The proposal price is: ₦' . $this->price)
                    ->action('Do well to take an Action', $this->urls)
                    ->line('Thank you for using our Airline !');
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
