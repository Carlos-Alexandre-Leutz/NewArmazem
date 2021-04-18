<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BudgetSent extends Mailable
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
            ->subject('Novo Orçamento pelo Site de [' . $this->data['name'] . ']')
            ->view('emails.budget.sent')->with([
                'products' => $this->data['products'],
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email']
            ]);
    }
}