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
            @foreach($data as $key => $value)
                | {{ $key }} | {{ $value }} |
            @endforeach
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
