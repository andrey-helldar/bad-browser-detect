<?php

namespace Helldar\BadBrowser\Services;

class UrlsService
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var null|string
     */
    protected $route_name = null;

    /**
     * UrlsService constructor.
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param $url
     *
     * @return \Helldar\BadBrowser\Services\UrlsService
     */
    public static function init($url)
    {
        return new self($url);
    }

    /**
     * @param $route_name
     *
     * @return $this
     */
    public function route($route_name)
    {
        $this->route_name = $route_name;

        return $this;
    }

    /**
     * @param null $url
     *
     * @return string
     */
    public function encode($url = null)
    {
        $to = base64_encode($url ?: $this->url);

        if ($this->route_name) {
            $to = route($this->route_name, compact('to'));
        }

        return $to;
    }

    /**
     * @return bool|string
     */
    public function decode()
    {
        return base64_decode($this->url);
    }

    public function encodedBrowserUrl($device_type = 'desktop')
    {
        $variables = VariablesService::init();

        $url = $variables->browserUrl($this->url, $device_type);
        $encoded = $this->route($variables->routeMainName())->encode($url);

        return $encoded;
    }
}
