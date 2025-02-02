<div class="card card-body mb-4">
    <form action="{{ route('dashboard.category.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('category.category_name') }}</label>
                    <input
                        type="text"
                        name="category_name"
                        id="category_name"
                        class="form-control"
                        placeholder="{{ __('category.category_name_placeholder') }}"
                        value="{{ request('category_name') }}">
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="discount" value="1" @if (request('discount')) checked @endif id="discount">
                    <label class="form-check-label" for="discount">
                        {{ __('category.discount') }}
                    </label>
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
