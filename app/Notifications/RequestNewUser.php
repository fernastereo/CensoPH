<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestNewUser extends Notification
{
    use Queueable;

    public $newUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $newUser)
    {
        $this->newUser = $newUser;
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
                    ->greeting('Hola ' . $notifiable->name)
                    ->subject('Verifique su usuario')
                    ->line('Por favor verifique su e-mail para continuar y tener acceso al espacio del Edificio Multifamiliar San Fernando Del Tabor - Barranquilla.')
                    ->action('Verificar E-mail', route('verify', $this->newUser->token))
                    ->line('Gracias por usar nuestro producto!')
                    ->salutation('Administración - San Fernando Del Tabor');
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
