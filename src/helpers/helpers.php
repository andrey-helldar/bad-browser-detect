<?php

if (!function_exists('bad_browser')) {
    /**
     * @param null $user_agent
     *
     * @return \Helldar\BadBrowser\Services\BadBrowser
     */
    function bad_browser($user_agent = null)
    {
        return app('bad_browser')->userAgent($user_agent);
    }
}

if (!function_exists('bad_browser_mix')) {
    /**
     * @param string $path
     *
     * @return string
     */
    function bad_browser_mix($path)
    {
        return \Helldar\BadBrowser\Services\Versioning::init()
            ->mix($path);
    }
}

if (!function_exists('bad_browser_url')) {
    /**
     * @param $url
     *
     * @return \Helldar\BadBrowser\Services\UrlsService
     */
    function bad_browser_url($url)
    {
        return \Helldar\BadBrowser\Services\UrlsService::init($url);
    }
}
