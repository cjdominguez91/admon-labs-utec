<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Confirmación de Registro';

    public  $datamsg;

    public function __construct($datamsg)
    {
        $this->datamsg = $datamsg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.confirmation');
    }
}
