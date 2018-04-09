@component('bad-browser::layouts')
    <div class="row">
        <div class="col s12 m10 l6 offset-m1 offset-l3">
            <div class="card hoverable">
                <div class="card-content">
                    <span class="card-title">{{ __('bad_browser::bad_browser.sended') }}</span>

                    <p>{{ __('bad_browser::bad_browser.disabling') }}</p>
                    <p>{{ __('bad_browser::bad_browser.just_go_to_main') }}</p>
                </div>
                <form action="{{ route($route_to) }}" method="post" class="card-action center-align">
                    <a href="{{ url('/') }}" class="btn waves-effect waves-light">
                        {{ __('bad_browser::bad_browser.buttons.main') }}
                    </a>

                    <button type="submit" class="btn-flat waves-effect waves-teal">
                        {{ __('bad_browser::bad_browser.buttons.disable_notify') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endcomponent
