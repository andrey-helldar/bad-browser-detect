<?php

$variables = \Helldar\BadBrowser\Services\VariablesService::init();

app('router')
    ->prefix($variables->routePrefix())
    ->group(function () use ($variables) {
        app('router')->get('/', 'Helldar\BadBrowser\Controllers\BadBrowsersController@show')->name($variables->routeMainName());
        app('router')->post('/', 'Helldar\BadBrowser\Controllers\BadBrowsersController@store');

        app('router')->post('disable', 'Helldar\BadBrowser\Controllers\BadBrowsersController@disable')->name($variables->routeDisableName());

        app('router')->get('to', 'Helldar\BadBrowser\Controllers\BadBrowsersController@to')->name($variables->routeToName());
    });
