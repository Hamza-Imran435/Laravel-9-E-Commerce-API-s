<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AccountVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // $array = explode(' ', $data);
        $this->data = $data;
        // dd($data);
    }


    public function handle()
    {

        $data = $this->data;
        // dd($data);
        // Mail::send('mail',$data, function ($message) use ($data) {
        //     $message->to($data['to']);
        //     $message->subject('Account Registration..!');
        // });
        Mail::send('mail', $data, function ($message) use ($data) {

            $message->to($data['to']);
            $message->subject('Account Registration..!');

        });
    }
}
