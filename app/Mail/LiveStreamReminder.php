<?php

namespace App\Mail;

use App\EventStream;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LiveStreamReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $stream;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventStream $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.live-stream-reminder')
            ->subject($this->stream->name . ' Akan Mulai 30 Menit Lagi');
    }
}
