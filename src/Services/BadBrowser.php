<?php

namespace Helldar\BadBrowser\Services;

use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class BadBrowser
{
    /**
     * @var null|string
     */
    protected $user_agent = null;

    /**
     * @var \Jenssegers\Agent\Agent
     */
    protected $agent;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $config;

    /**
     * BadBrowser constructor.
     */
    public function __construct()
    {
        $this->agent  = new Agent();
        $this->config = collect(config('bad_browser.versions', []));
    }

    /**
     * Set User-Agent into class.
     *
     * @param null $user_agent
     *
     * @return $this
     */
    public function userAgent($user_agent = null)
    {
        $this->user_agent = $user_agent;
        $this->agent->setUserAgent($user_agent);

        return $this;
    }

    /**
     * Detect crawler in user-agent string.
     *
     * @return bool
     */
    public function isCrawler()
    {
        return $this->agent->isRobot($this->user_agent);
    }

    /**
     * Check browser version.
     *
     * @return bool|mixed
     */
    public function isAccept()
    {
        $browser = $this->agent->browser($this->user_agent);
        $version = $this->agent->version($browser);

        $browser = Str::lower($browser);

        if ($need = $this->config->get($browser)) {
            return version_compare((string) $version, (string) $need, '>=');
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isNotAccept()
    {
        return !$this->isAccept();
    }

    /**
     * @return bool
     */
    public function isNotCrawler()
    {
        return !$this->isCrawler();
    }
}
