<?php

namespace Helldar\BadBrowser\Services;

use Helldar\BadBrowser\Traits\Services;
use Illuminate\Support\Str;

class VariablesService
{
    use Services;

    /**
     * @return string
     */
    public function routePrefix()
    {
        $prefix = config('bad_browser.route_prefix', 'bad-browser');

        return Str::slug($prefix);
    }

    /**
     * @return string
     */
    public function routeMainName()
    {
        $camel = Str::camel($this->routePrefix());
        $snake = Str::snake($camel);

        return $snake;
    }

    /**
     * @return string
     */
    public function routeToName()
    {
        return sprintf("%s.to", $this->routeMainName());
    }

    /**
     * @return string
     */
    public function routeDisableName()
    {
        return sprintf("%s.disable", $this->routeMainName());
    }

    /**
     * Route for main page of the "bad browser".
     *
     * @return mixed
     */
    public function routeMain()
    {
        return route($this->routeMainName());
    }

    /**
     * @return mixed
     */
    public function routeTo()
    {
        return route($this->routeToName());
    }

    /**
     * @return mixed
     */
    public function routeDisable()
    {
        return route($this->routeDisableName());
    }

    /**
     * @param string $browser_name
     * @param string $device_type
     *
     * @return string
     */
    public function browserUrl($browser_name = 'chrome', $device_type = 'desktop')
    {
        $browser_name = str_slug($browser_name);
        $device_type  = str_slug($device_type);

        return config("bad_browser_constants.url.{$browser_name}.$device_type");
    }
}
