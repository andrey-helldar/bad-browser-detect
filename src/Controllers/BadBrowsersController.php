<?php

namespace Helldar\BadBrowser\Controllers;

use Helldar\BadBrowser\Jobs\NotifyJob;
use Helldar\BadBrowser\Models\BadBrowser;
use Helldar\BadBrowser\Services\UrlsService;
use Helldar\BadBrowser\Services\VariablesService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class BadBrowsersController extends Controller
{
    /**
     * @var VariablesService
     */
    protected $variables;

    /**
     * BadBrowsersController constructor.
     */
    public function __construct()
    {
        $this->variables = VariablesService::init();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Jenssegers\Agent\Agent  $agent
     *
     * @return mixed
     */
    public function show(Request $request, Agent $agent)
    {
        $browser = $agent->browser($request->userAgent());
        $version = $agent->version($browser);
        $need    = config('bad_browser.versions.' . Str::lower($browser), 'unknown');

        $route_name = $this->variables->routeMainName();
        $route_to   = $this->variables->routeToName();

        return view('bad-browser::info')
            ->with(compact('browser', 'version', 'need', 'route_name', 'route_to'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $user_id    = \Auth::check() ? \Auth::user()->id : null;
        $user_agent = $request->userAgent();
        $client_ip  = $request->getClientIp();

        $item = BadBrowser::query()
            ->create(compact('user_id', 'user_agent', 'client_ip'));

        NotifyJob::dispatch($item);

        $route_to = $this->variables->routeDisableName();

        return view('bad-browser::sended')
            ->with(compact('route_to'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function disable(Request $request)
    {
        $cookie = cookie('bad-browser-disable', true, 60 * 24 * 3);

        return redirect('/')->cookie($cookie);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function to(Request $request)
    {
        if ($to = $request->get('to')) {
            $to = UrlsService::init($to)->decode();

            return redirect($to);
        }

        return redirect()->route($this->variables->routeMainName());
    }
}
