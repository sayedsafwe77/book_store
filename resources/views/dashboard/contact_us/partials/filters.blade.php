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
                    <label for="name">{{ __('contact_us.email') }}</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="{{ __('contact_us.email_placholder') }}"
                        value="{{ request('email') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
