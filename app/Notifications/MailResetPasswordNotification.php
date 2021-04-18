<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $link = url("/password/reset/$this->token");

        return (new MailMessage)
            ->markdown('vendor.notifications.email')
            ->from(config('mail.from.address'))
            ->subject('Redefinição de Senha')
            ->line("Conforme solicitado, segue o link para redefinição de senha.")
            ->action('Redefinir Senha', $link)
            ->line('Obrigado!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
