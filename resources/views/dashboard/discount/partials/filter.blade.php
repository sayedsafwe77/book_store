<div class="card card-body mb-4">
    <form action="{{ route('dashboard.discount.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('categories.category_name') }}</label>
                    <input
                        type="text"
                        name="category_name"
                        id="category_name"
                        class="form-control"
                        placeholder="{{ __('categories.category_name_placeholder') }}"
                        value="{{ request('category_name') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
