<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendInvitation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $id, $invitedby)
    {
        $this->name = $name;
        $this->id = $id;
        $this->invitedby = $invitedby;
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
            ->line('Hello Futur Maker, 
            You have been invited by'. $this->invitedby .' to join the '.  $this->name .'. You can access the group via https://a4ai-App.com/groups/members/'.$this->id )
            ->action('Go to circle', url('groups/members',$this->id))
            ->line('Thank you for using our a4ai-app, see you soon!');
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
            'name' => $this->name,
            'id' => $this->id,
            'invitedby' => $this->invitedby,
        ];
    }
}
