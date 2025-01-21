<div class="card card-body mb-4">
    <form action="{{ route('dashboard.contact_us.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">{{ __('contact_us.name') }}</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="{{ __('contact_us.name_placholder') }}"
                        value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="name">{{ __('contact_us.massage') }}</label>
                    <input
                        type="text"
                        name="massage"
                        id="massage"
                        class="form-control"
                        placeholder="{{ __('contact_us.massage_placholder') }}"
                        value="{{ request('massage') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
