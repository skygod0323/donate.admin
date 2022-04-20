<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Receipt extends Mailable
{
    use Queueable, SerializesModels;

    protected $donation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donation)
    {
        //
        $this->donation = $donation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Donation')
                    ->view('view.receipt')
                    ->with([
                        'donation' => $this->donation
                    ]);
    }
}
