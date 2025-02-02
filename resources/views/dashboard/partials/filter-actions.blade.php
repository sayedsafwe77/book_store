
<button type="submit" class="btn btn-primary">{{ __('actions.filter') }}</button>
<a href="javascript:void(0)" onclick="resetFilters()" class="btn btn-secondary">{{ __('actions.reset') }}</a>
@section('js')
    <script>
        function resetFilters() {
            window.location.href = window.location.pathname;
        }
    </script>
@stop
