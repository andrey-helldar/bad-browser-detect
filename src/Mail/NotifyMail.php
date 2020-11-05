<?php

namespace Helldar\BadBrowser\Mail;

use Helldar\BadBrowser\Traits\NotificationData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable;
    use SerializesModels;
    use NotificationData;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(config('bad_browser.email.from'));
        $this->subject($this->title);

        $this->compactData();

        return $this->markdown('bad-browser::notify');
    }
}
