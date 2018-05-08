<?php

return [
    /*
     * The URL prefix.
     * Default, 'bad-browser' to get the link of the page view.
     */

    'route_prefix' => 'bad-browser',

    /*
     * Page title for the 'bad browser' page.
     */

    'page' => [
        'title' => 'Bad Browser Detected',

        /*
         * If you want to override the package styles, you can create your own stylesheet and link to it.
         */

        // 'additional_css' => 'css/bad-browser.css',
    ],

    /*
     * Minimum permissible versions of browsers.
     */

    'versions' => [
        'ie' => 11,
        'edge' => 10,
        'chrome' => 43,
        'opera' => 43,
        'opera-mini' => 43,
        'firefox' => 31,
        'safari' => 8,
        'android' => 5,
        'ios' => 7,
        'ucbrowser' => 9,
        'vivaldi' => 1,
    ],

    /*
     * Data for sending email messages to the administrator.
     */

    'email' => [
        'enabled' => env('BAD_BROWSER_EMAIL_ENABLED', true),

        'from' => env('BAD_BROWSER_EMAIL_FROM', 'example@example.com'),
        'to' => env('BAD_BROWSER_EMAIL_TO', 'example@example.com'),

        'subject' => 'Device is incorrectly detected',
    ],

    'slack' => [
        'enabled' => env('BAD_BROWSER_SLACK_ENABLED', false),
        'webhook' => env('BAD_BROWSER_SLACK_WEBHOOK'),

        'username' => 'Bad Browser Detected',

        /*
         * URL Address of icon.
         */

        'icon' => 'https://ai-rus.com/images/browser-crashed.png',
    ],
];
