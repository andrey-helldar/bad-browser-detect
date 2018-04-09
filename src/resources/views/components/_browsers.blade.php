<div class="row">
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
