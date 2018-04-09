<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ __('bad_browser::bad_browser.use_bad') }}</title>

    <link rel="stylesheet" href="{{ bad_browser_mix('css/bad-browser.css') }}">
</head>
<body class="grey lighten-3">

<div class="bad-browser">

    {!! $slot !!}

</div>

</body>
</html>
