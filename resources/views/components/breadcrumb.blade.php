    @foreach ($breadcrumbs as $breadcrumb)
        @if ($loop->last)
                 {{ __('adminlte::adminlte.' . capitalize($breadcrumb['text']) ) }}
        @else
                <a href="{{ $breadcrumb['url'] }}">
                    {{ __('adminlte::adminlte.' . $breadcrumb['text']) }} /
                </a>
        @endif
    @endforeach
