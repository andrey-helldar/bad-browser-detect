<div class="row">
    <div class="col s12 m12">
        <p>&nbsp;</p>
        <p>{{ __('bad_browser::bad_browser.install_that') }}</p>
    </div>

    <div class="col s6 m4">
        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Chrome
        @endcomponent
    </div>

    <div class="col s6 m4">
        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Opera
        @endcomponent
    </div>

    <div class="col s6 m4">
        @component('bad-browser::components._browser')
            @slot('route_to', $route_to)

            Firefox
        @endcomponent
    </div>
</div>
