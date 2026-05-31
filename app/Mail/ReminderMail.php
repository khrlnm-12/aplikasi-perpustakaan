<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;
    public $type;

    public function __construct($transaksi, $type)
    {
        $this->transaksi = $transaksi;
        $this->type = $type;
    }

    public function build()
    {
        return $this
            ->subject(
                'Notifikasi Perpustakaan'
            )
            ->view(
                'email.reminder'
            );
    }
}