<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Swift_Signers_DKIMSigner;

class SaveTheDate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->subject('Hello World');

        $this->to(['example@email.com']);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->withSwiftMessage(function ($message) {
            
            $privateKey = Storage::get('dkim-private.pem');
            
            $domainName = config('mail.domain_name');
            
            $selector = config('mail.selector');
            
            $passphrase = config('mail.passphrase');

            $signer = new Swift_Signers_DKIMSigner($privateKey, $domainName, $selector, $passphrase);
            
            $message->attachSigner($signer);
        });

        return $this->view('emails.example');
    }
}
