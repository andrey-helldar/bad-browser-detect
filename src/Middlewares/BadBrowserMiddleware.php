<?php

namespace Helldar\BadBrowser\Middlewares;

use Helldar\BadBrowser\Services\VariablesService;
use Illuminate\Http\Request;

class BadBrowserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        $bad_browser = bad_browser($request->userAgent());
        $cookie      = $request->cookie('bad-browser-disable', false);

        if ($bad_browser->isNotCrawler() && $bad_browser->isNotAccept() && !$cookie && $this->isNotAPI($request)) {
            $variables = VariablesService::init();

            $base_url   = $request->url();
            $route_urls = [
                $variables->routeMain(),
                $variables->routeTo(),
                $variables->routeDisable(),
            ];

            if (!str_contains($base_url, $route_urls)) {
                return redirect()->route($variables->routeMainName(), [], 307);
            }
        }

        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function isNotAPI(Request $request)
    {
        $url = $request->path();

        return !starts_with($url, 'api/');
    }
}
