<div class="bad-browser-item">
    <a href="{{ bad_browser_url($slot)->encodedBrowserUrl('desktop') }}" class="browser" target="_blank">
        <div class="browser-icon browser-icon-{{ str_slug($slot) }}"></div>

        {{ $slot }}
    </a>

    @include('bad-browser::components._mobile_store')

</div>
