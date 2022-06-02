<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DiscussionCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $start_at, $end_at, $user, $link)
    {
        $this->title = $title;
        $this->start_at = $start_at;
        $this->end_at = $end_at;
        $this->user = $user;
        $this->link = $link;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line('Hello Futur Maker, 
                    Thank for taking this opportunity to host discussion on the A4ai-App. 
                    As we settled, the meeting start-at:', $this->start_at,' to ', $this->end_at, '. Join the meeting via', $this->link)
                    ->action('Go to discussion', url('/'))
                    ->line('Thank you for using our application, see you soon!');
    }

    public function toDatabase(){
        return [
            'title' => $this->title,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
        ];
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
