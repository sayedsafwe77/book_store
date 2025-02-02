<div class="card card-body mb-4">
    <form action="{{ route('dashboard.flash_sale.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('flash_sale.name') }}</label>
                    <input
                        type="text"
                        name="sale_name"
                        id="name"
                        class="form-control"
                        placeholder="{{ __('flash_sale.name_filter_placeholder') }}"
                        value="{{ request('sale_name') }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="name">{{ __('flash_sale.description') }}</label>
                    <input
                        type="text"
                        name="description"
                        id="description"
                        class="form-control"
                        placeholder="{{ __('flash_sale.description_filter_placeholder') }}"
                        value="{{ request('description') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
