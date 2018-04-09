<?php

namespace Helldar\BadBrowser\Mail;

use Helldar\BadBrowser\Models\BadBrowser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \Helldar\BadBrowser\Models\BadBrowser
     */
    public $bad_browser;

    /**
     * @var string
     */
    public $title;

    /**
     * Create a new message instance.
     *
     * @param \Helldar\BadBrowser\Models\BadBrowser $bad_browser
     */
    public function __construct(BadBrowser $bad_browser)
    {
        $this->bad_browser = $bad_browser;
        $this->title       = config('bad_browser.email.subject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(config('bad_browser.email.from'));
        $this->subject($this->title);

        return $this->markdown('bad-browser::notify');
    }
}
