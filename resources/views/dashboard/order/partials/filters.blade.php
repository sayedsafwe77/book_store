<div class="card card-body mb-4">
    <form action="{{ route('dashboard.order.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('order.number') }}</label>
                    <input type="text" name="order_number" id="number" class="form-control"
                        placeholder="{{ __('order.name_placholder') }}" value="{{ request('order_number') }}">
                </div>
            </div>
            <div class="col-md-4">
                <x-adminlte-select name="order_status" label="{{ __('order.status') }}">
                    <option value="" selected>-- {{ __('actions.choose') }} --</option>
                    <option @if (request('order_status') == 'delivered') selected @endif value="delivered">
                        {{ __('order.delivered') }}
                    </option>
                    <option @if (request('order_status') == 'pending') selected @endif value="pending">{{ __('order.pending') }}
                    </option>
                    <option @if (request('order_status') == 'refunded') selected @endif value="refunded">
                        {{ __('order.refunded') }}
                    </option>
                </x-adminlte-select>
            </div>

            <div class="col-md-4">
                <x-adminlte-select name="order_payment_status" label="{{ __('order.payment_status') }}">
                    <option value="" selected>-- {{ __('actions.choose') }} --</option>
                    <option @if (request('order_payment_status') == 'paid') selected @endif value="paid">{{ __('order.paid') }}
                    </option>
                    <option @if (request('order_payment_status') == 'pending') selected @endif value="pending">{{ __('order.pending') }}
                    </option>
                    <option @if (request('order_payment_status') == 'refunded') selected @endif value="refunded">
                        {{ __('order.refunded') }}
                    </option>
                </x-adminlte-select>
            </div>

            <div class="col-md-4">
                <x-adminlte-select name="order_payment_type" label="{{ __('order.payment_type') }}">
                    <option value="" selected>-- {{ __('actions.choose') }} --</option>
                    <option @if (request('order_payment_type') == 'cash') selected @endif value="cash">{{ __('order.cash') }}
                    </option>
                    <option @if (request('order_payment_type') == 'visa') selected @endif value="visa">{{ __('order.visa') }}
                    </option>
                </x-adminlte-select>
            </div>

            <div class="col-md-4">
                <x-adminlte-select name="order_shipping" label="{{ __('order.shipping_area_id') }}">
                    <option value="" selected>-- {{ __('actions.choose') }} --</option>
                    @if (!empty($getData['shipping_areas']) && isset($getData['shipping_areas']))
                        @foreach ($getData['shipping_areas'] as $shipping)
                            <option @if (request('order_shipping') == $shipping->id) selected="selected" @endif
                                value="{{ $shipping->id }}">
                                {{ $shipping->name }} ➜ ( {{ $shipping->fee }} )</option>
                        @endforeach
                    @else
                        <div class="alert alert-secondary" role="alert">
                            {{ __('actions.dont_have_data') }}
                        </div>
                    @endif
                </x-adminlte-select>
            </div>
            <div class="col-md-4">
                <x-adminlte-select name="order_user" label="{{ __('order.user_id') }}">
                    <option value="" selected>-- {{ __('actions.choose') }} --</option>
                    @if (!empty($getData['users']) && isset($getData['users']))
                        @foreach ($getData['users'] as $user)
                            <option @if (request('order_user') == $user->id) selected="selected" @endif
                                value="{{ $user->id }}">

                                {{ $user->name }}</option>
                        @endforeach
                    @else
                        <div class="alert alert-secondary" role="alert">
                            {{ __('actions.dont_have_data') }}
                        </div>
                    @endif
            </div>
            </x-adminlte-select>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
