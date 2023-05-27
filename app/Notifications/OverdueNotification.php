<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OverdueNotification extends Notification
{
    use Queueable;

    protected $bookRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bookRequest)
    {
        $this->bookRequest = $bookRequest;
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
                    ->subject('Return the book soon')
                    ->line('This \'' . $this->bookRequest->product->title . '\' needs to be returned within ' . $this->bookRequest->return_date)
                   // ->action('Notification Action', url('/library-dashboard'))
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
