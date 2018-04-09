<?php

namespace Helldar\BadBrowser\Jobs;

use Helldar\BadBrowser\Mail\NotifyMail;
use Helldar\BadBrowser\Models\BadBrowser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var BadBrowser
     */
    protected $bad_browser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BadBrowser $bad_browser)
    {
        $this->bad_browser = $bad_browser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NotifyMail($this->bad_browser);

        \Mail::to(config('bad_browser.email.to'))
            ->send($email);
    }
}
