<?php

namespace Helldar\BadBrowser\Notifications;

use Helldar\BadBrowser\Models\BadBrowser;
use Helldar\BadBrowser\Traits\NotificationData;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotify extends Notification
{
    use Queueable, NotificationData;

    /**
     * @var \Helldar\BadBrowser\Models\BadBrowser
     */
    protected $bad_browser;

    /**
     * Create a new notification instance.
     *
     * @param \Helldar\BadBrowser\Models\BadBrowser $bad_browser
     */
    public function __construct(BadBrowser $bad_browser)
    {
        $this->bad_browser = $bad_browser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param $notifiable
     *
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $this->compactData();

        return (new SlackMessage())
            ->error()
            ->from(config('bad_browser.slack.username'), config('bad_browser.slack.icon'))
            ->content($this->title)
            ->attachment(function (SlackAttachment $attachment) {
                $attachment
                    ->title($this->exception->getMessage())
                    ->fields($this->data->toArray())
                    ->footer(config('app.name'))
                    ->timestamp(now());
            });
    }
}