<div class="browsers">
    <div class="browsers-title">
        {{ __('bad_browser::bad_browser.install_that') }}
    </div>

    <div class="browsers-items">
        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Chrome
        @endcomponent

        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Opera
        @endcomponent

        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Firefox
        @endcomponent
    </div>
</div>
