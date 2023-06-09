<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class notifyOpenSession extends Notification
{
    use Queueable;
    public $user;
    public $finalidades;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, $finalidades)
    {
        $this->user = $user;
        $this->finalidades = $finalidades;
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
                    ->line('Olá '.$this->user->name.'! Uma nova sessão foi aberta.')
                    ->line('Finalidades: '.$this->finalidades)
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
