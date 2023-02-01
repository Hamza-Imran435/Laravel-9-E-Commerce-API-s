<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountVerifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;
    public $random;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data , $random)
    {
        //
        $this->detail = $data;
        $this->random = $random;
    }

    public function build(){
        $data = $this->detail;
        $random = $this->random;
        return $this->subject('Verify Account')->view('mail')->with('data', $data)->with('random' , $random);
    }
}
