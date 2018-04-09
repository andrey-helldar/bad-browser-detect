@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $title }}
        @endcomponent
    @endslot

    {{-- Body --}}
    @slot('subcopy')
        @component('mail::table')
            | Key | Value |
            | --- |:---:|
            | DB ID | {{ $bad_browser->id }} |
            | User Agent | {{ $bad_browser->user_agent }} |
            | User ID | {{ $bad_browser->user_id ?: '---' }} |
            | IP | {{ $bad_browser->client_ip }} |
            | Date | {{ date('Y-m-d H:i:s') }} |
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
