<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $htmlSend;
    private $usersSend;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($htmlSend, $usersSend)
    {
        $this->htmlSend = $htmlSend;
        $this->usersSend = $usersSend;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->usersSend as $user) {
            Mail::html($this->htmlSend, function ($message) use ($user) {
                    $message->from('kino@cms.com', 'KinoCMS');
                    $message->subject('KinoCMS Mailing List');
                    $message->to($user);
            });
        }

    }
}
