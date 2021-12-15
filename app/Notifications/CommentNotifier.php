<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotifier extends Notification
{
    use Queueable;

    private $commentData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($commentData)
    {
        $this->commentData = $commentData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Someone has commented you one of your posts!')
            ->line('Comment: ' . $this->commentData['text_content'])
            ->line('From: '. $this->commentData['comment_poster']) //todo add sender to email
            ->action('View your post:', url(route('posts.show', ['id' => $this->commentData['post_id']])))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
