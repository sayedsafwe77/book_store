<div class="card card-body mb-4">
    <form action="{{ route('dashboard.discount.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('discount.discount_code') }}</label>
                    <input
                        type="text"
                        name="discount_code"
                        id="discount_code"
                        class="form-control"
                        placeholder="{{ __('discount.discount_code_placeholder') }}"
                        value="{{ request('discount_code') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('discount.quantity') }}</label>
                    <input
                        type="number"
                        name="quantity"
                        id="quantity"
                        class="form-control"
                        placeholder="{{ __('discount.quantity_placeholder') }}"
                        value="{{ request('quantity') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('discount.percentage') }}</label>
                    <input
                        type="text"
                        name="percentage"
                        id="percentage"
                        class="form-control"
                        placeholder="{{ __('discount.percentage_placeholder') }}"
                        value="{{ request('percentage') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('discount.expiry_date') }}</label>
                    <input
                        type="datetime-local"
                        name="expiry_date"
                        id="expiry_date"
                        class="form-control"
                        placeholder="{{ __('discount.expiry_date_placeholder') }}"
                        value="{{ request('expiry_date') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
