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
    ],

    /*
     * Minimum permissible versions of browsers.
     */

    'versions' => [
        'msie'    => 11,
        'msedge'  => 10,
        'edge'    => 10,
        'chrome'  => 43,
        'opera'   => 43,
        'firefox' => 31,
        'safari'  => 8,
        'android' => 5,
        'ios'     => 7,
    ],

    /*
     * Data for sending email messages to the administrator.
     */

    'email' => [
        'from' => 'example@example.com',
        'to'   => 'example@example.com',

        'subject' => 'Device is incorrectly detected',
    ],
];
