<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $isi_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($isi_email)
    {
        $this->isi_email = $isi_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notifikasi Penerapan Risiko')
            ->view('email.notif_email');

        // return $this->view('email.notif_email');
    }
}
