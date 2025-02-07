<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $email;

    public function __construct($data)
    {
        $this->text = $data->text;
        $this->email = $data->email;
    }

    public function build()
    {
        return $this->subject('Новая заявка на поиск специальности')
                    ->view('emails.request');
    }
}
