@component('bad-browser::layouts')
    <div class="row">
        <div class="col s12 m10 l6 offset-m1 offset-l3">
            <div class="card hoverable">
                <div class="card-content">
                    <span class="card-title">{{ __('bad_browser::bad_browser.need_cookie') }}</span>
                    <p>{!! __('bad_browser::bad_browser.determined', compact('browser', 'version', 'need')) !!}</p>

                    @if(version_compare((string) $version, (string) $need, '>='))
                        <p>&nbsp;</p>
                        <p>{{ __('bad_browser::bad_browser.manual_redirect', compact('version', 'need')) }}</p>
                    @endif

                    @include('bad-browser::components._browsers')

                    <p>{!! __('bad_browser::bad_browser.mistake') !!}</p>
                </div>
                <form action="{{ route($route_name) }}" method="post" class="card-action center-align">
                    <a href="{{ url('/') }}" class="btn waves-effect waves-light">
                        {{ __('bad_browser::bad_browser.buttons.main') }}
                    </a>

                    <button type="submit" class="btn-flat waves-effect waves-teal">
                        {{ __('bad_browser::bad_browser.buttons.report_us') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endcomponent
