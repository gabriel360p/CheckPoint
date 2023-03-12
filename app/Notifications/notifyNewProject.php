<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class notifyNewProject extends Notification
{
    use Queueable;
    public $user;
    public $projeto;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, $projeto)
    {
        $this->user=$user;
        $this->projeto=$projeto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('CheckPoint')
                    ->line('Olá '.$this->user->name.' ! O projeto '.$this->projeto.' foi cadastrado com sucesso')
                    // ->action('Notification Action', url('/'))
                    ->line('Gratidão por utilizar CheckPoint!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
