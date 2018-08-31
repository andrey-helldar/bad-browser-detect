<div class="browser-item">
    <a href="{{ bad_browser_url($slot)->encodedBrowserUrl('desktop') }}" target="_blank">
        <span class="browser-icon browser-icon-{{ str_slug($slot) }}"></span>

        {{ $slot }}
    </a>

    @include('bad-browser::components._mobiles')

</div>
