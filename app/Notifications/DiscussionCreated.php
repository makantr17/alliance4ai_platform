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
    public function __construct($title, $discussion_id,  $start_at, $end_at, $link)
    {
        $this->title = $title;
        $this->discussion_id = $discussion_id;
        $this->start_at = $start_at;
        $this->end_at = $end_at;
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
                    ->line('Hello Future Maker, 
                    You have been invited to join a new discussion on the A4ai-App platforl. 
                    As we settled, the meeting start-at:', $this->start_at,' to ', $this->end_at, '. Join the meeting via', $this->link)
                    ->action('Go to discussion', url('https://a4ai-app.org/discussion/details', $this->discussion_id))
                    ->line('Thank you for using our application, see you soon!');
    }

    public function toDatabase(){
        return [
            'title' => $this->title,
            'discussion_id' => $this->discussion_id,
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
