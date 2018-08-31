<?php

namespace Helldar\BadBrowser\Middlewares;

use Helldar\BadBrowser\Services\VariablesService;
use Illuminate\Http\Request;

class BadBrowserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        $is_enable   = config('bad_browser.enable', true);
        $bad_browser = bad_browser(\request()->userAgent());
        $cookie      = $request->cookie('bad-browser-disable', false);

        if ($is_enable && $bad_browser->isNotCrawler() && $bad_browser->isNotAccept() && !$cookie && $this->isNotAPI($request)) {
            $variables = VariablesService::init();

            $base_url   = $request->url();
            $route_urls = $this->urls($variables);

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
    private function isNotAPI(Request $request)
    {
        $url = $request->path();

        return !starts_with($url, 'api/');
    }

    /**
     * @param VariablesService $variables
     *
     * @return array
     */
    private function urls($variables)
    {
        return [
            $variables->routeMain(),
            $variables->routeTo(),
            $variables->routeDisable(),
        ];
    }
}
