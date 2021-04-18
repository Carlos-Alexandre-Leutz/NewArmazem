<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSent extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject('Novo Contato pelo Site de [' . $this->data['name'] . ']')
            ->view('emails.contact.sent')->with([
                'subject' => $this->data['subject'],
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email'],
                'msg' => $this->data['message']
            ]);
    }
}