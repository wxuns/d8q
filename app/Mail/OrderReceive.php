<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReceive extends Mailable
{
    use Queueable, SerializesModels;
    private $id = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->id = session('user_id');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderreceive')
            ->subject('网站新订单通知..');
    }
}
