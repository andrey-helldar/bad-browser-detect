@component('bad-browser::layouts')
    <div class="card">
        <div class="card-content">
            <span class="card-title">{{ __('bad_browser::bad_browser.sended') }}</span>

            <p>{{ __('bad_browser::bad_browser.disabling') }}</p>
            <p>{{ __('bad_browser::bad_browser.just_go_to_main') }}</p>
        </div>

        <form action="{{ route($route_to) }}" method="post" class="card-action">
            {{ csrf_field() }}

            <a href="{{ url('/') }}" class="btn">
                {{ __('bad_browser::bad_browser.buttons.main') }}
            </a>

            <button type="submit" class="btn-flat">
                {{ __('bad_browser::bad_browser.buttons.disable_notify') }}
            </button>
        </form>
    </div>
@endcomponent
