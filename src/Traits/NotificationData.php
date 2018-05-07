<?php

namespace Helldar\BadBrowser\Traits;

use Helldar\BadBrowser\Models\BadBrowser;
use Jenssegers\Agent\Agent;

trait NotificationData
{
    /**
     * @var \Helldar\BadBrowser\Models\BadBrowser
     */
    protected $bad_browser;

    /**
     * @var \Jenssegers\Agent\Agent
     */
    protected $agent;

    /**
     * @var string
     */
    public $title;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $data;

    /**
     * NotificationData constructor.
     *
     * @param \Helldar\BadBrowser\Models\BadBrowser $bad_browser
     * @param \Jenssegers\Agent\Agent               $agent
     */
    public function __construct(BadBrowser $bad_browser, Agent $agent)
    {
        $this->bad_browser = $bad_browser;
        $this->agent       = $agent;

        $this->title = config('bad_browser.email.subject');

        $this->data = collect([]);
    }

    protected function compactData()
    {
        $this->data->put('Device Type', $this->deviceType());
        $this->data->put('Device', $this->device());
        $this->data->put('Platform', $this->platform());
        $this->data->put('Browser', $this->browser());
        $this->data->put('DB ID', $this->bad_browser->id);
        $this->data->put('User Agent', $this->bad_browser->user_agent);
        $this->data->put('User ID', $this->bad_browser->user_id ?: '---');
        $this->data->put('IP', $this->bad_browser->client_ip);
        $this->data->put('Date', $this->bad_browser->created_at);
    }

    /**
     * @return string
     */
    protected function deviceType()
    {
        $user_agent = $this->bad_browser->user_agent;

        if ($this->agent->isRobot($user_agent)) {
            return 'Robot';
        }

        if ($this->agent->isMobile($user_agent)) {
            return 'Mobile';
        }

        if ($this->agent->isPhone($user_agent)) {
            return 'Phone';
        }

        if ($this->agent->isTablet($user_agent)) {
            return 'Tablet';
        }

        if ($this->agent->isDesktop($user_agent)) {
            return 'Desktop';
        }

        return 'Unknown';
    }

    /**
     * @return string
     */
    protected function device()
    {
        return $this->agent->device($this->bad_browser->user_agent);
    }

    /**
     * @return string
     */
    protected function platform()
    {
        $platform = $this->agent->platform($this->bad_browser->user_agent);
        $version  = $this->agent->version($platform);

        return implode(' ', [$platform, $version]);
    }

    /**
     * @return string
     */
    protected function browser()
    {
        $browser = $this->agent->browser($this->bad_browser->user_agent);
        $version = $this->agent->version($browser);

        return implode(' ', [$browser, $version]);
    }
}
