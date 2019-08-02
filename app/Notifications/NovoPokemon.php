<?php

namespace App\Notifications;

use App\Pokemon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NovoPokemon extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pokemon $novoPokemon)
    {
        $this->pokemon = $novoPokemon;
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
        $user = $notifiable;
        $pokemon = $this->pokemon;
        return (new MailMessage) 
                    ->greeting('Parabéns, '.$user->nome.'!')
                    ->line('Você capturou um novo pokémon')
                    ->line('Nome: '.$pokemon->nome)
                    ->line('Tipo: '.$pokemon->tipo_1)
                    ->line('Genero: '.$pokemon->genero)
                    ->line('Venha Conferir!');
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
