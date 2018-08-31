@component('bad-browser::layouts')
    <div class="card">
        <div class="card-content">
            <span class="card-title">{{ __('bad_browser::bad_browser.need_cookie') }}</span>
            <p>{!! __('bad_browser::bad_browser.determined', compact('browser', 'version', 'need')) !!}</p>

            @if(version_compare((string) $version, (string) $need, '>='))
                <p>{{ __('bad_browser::bad_browser.manual_redirect', compact('version', 'need')) }}</p>
            @endif

            @include('bad-browser::components._browsers')

            <p>{!! __('bad_browser::bad_browser.mistake') !!}</p>
        </div>
        <form action="{{ route($route_name) }}" method="post" class="card-action">
            {{ csrf_field() }}

            <a href="{{ url('/') }}" class="btn">
                {{ __('bad_browser::bad_browser.buttons.main') }}
            </a>

            <button type="submit" class="btn-flat">
                {{ __('bad_browser::bad_browser.buttons.report_us') }}
            </button>
        </form>
    </div>
@endcomponent
