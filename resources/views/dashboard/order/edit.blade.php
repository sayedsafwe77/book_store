@extends('dashboard.layout')

@section('title', 'Order Create')


@section('content')
    <form action="{{ route('dashboard.order.update', $order['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            {{-- Number --}}
            <x-adminlte-input disabled name="number" label="{{ __('order.number') }}" value="{{ $order['number'] }}"
                type="text" placeholder="ex: 10.10" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                fgroup-class="col-md-4" />

            {{-- Transaction Reference --}}
            <x-adminlte-input name="transaction_reference" label="{{ __('order.transaction_reference') }}"
                value="{{ old('transaction_reference', $order['transaction_reference']) }}" type="text"
                placeholder="ex: TxRef.******" fgroup-class="col-md-4" />
            <button id="generate-TxRef" type="button" class="btn btn-outline-primary col-md-2 btn-sm"
                style="margin-top:3.5%;height: 50%;">{{ __('order.generate') }}
                <i class="fas fa-random"></i></button>

            {{-- Shipping Fee --}}
            <x-adminlte-input name="shipping_fee" label="{{ __('order.shipping_fee') }}"
                value="{{ old('shipping_fee', $order['shipping_fee']) }}" type="text" placeholder="ex: 10.10"
                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-4" />


            {{-- Books Total --}}
            <x-adminlte-input name="books_total" label="{{ __('order.books_total') }}"
                value="{{ old('books_total', $order['books_total']) }}" type="text" placeholder="ex: 10.10"
                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

            {{-- Total --}}
            <x-adminlte-input name="total" label="{{ __('order.total') }}" value="{{ old('total', $order['total']) }}"
                type="text" placeholder="ex: 10.10" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                fgroup-class="col-md-6" />

            {{-- Status --}}
            <x-adminlte-select name="status" label="{{ __('order.status') }}" fgroup-class="col-md-6">
                <option value="" selected>-- {{ __('actions.choose') }} --</option>
                <option @if (old('status', $order['status']) == 'delivered') selected @endif value="delivered">{{ __('order.delivered') }}
                </option>
                <option @if (old('status', $order['status']) == 'pending') selected @endif value="pending">{{ __('order.pending') }}
                </option>
                <option @if (old('status', $order['status']) == 'refunded') selected @endif value="refunded">{{ __('order.refunded') }}
                </option>
            </x-adminlte-select>

            {{-- Payment Status --}}
            <x-adminlte-select name="payment_status" label="{{ __('order.payment_status') }}" fgroup-class="col-md-6">
                <option value="" selected>-- {{ __('actions.choose') }} --</option>
                <option @if (old('payment_status', $order['payment_status']) == 'paid') selected @endif value="paid">{{ __('order.paid') }}</option>
                <option @if (old('payment_status', $order['payment_status']) == 'pending') selected @endif value="pending">{{ __('order.pending') }}
                </option>
                <option @if (old('payment_status', $order['payment_status']) == 'refunded') selected @endif value="refunded">{{ __('order.refunded') }}
                </option>
            </x-adminlte-select>

            {{-- Payment Type --}}
            <x-adminlte-select name="payment_type" label="{{ __('order.payment_type') }}" fgroup-class="col-md-6">
                <option value="" selected>-- {{ __('actions.choose') }} --</option>
                <option @if (old('payment_type', $order['payment_type']) == 'cash') selected @endif value="cash">{{ __('order.cash') }}</option>
                <option @if (old('payment_type', $order['payment_type']) == 'visa') selected @endif value="visa">{{ __('order.visa') }}</option>
            </x-adminlte-select>

            {{-- Tax Amount --}}
            <x-adminlte-input name="tax_amount" label="{{ __('order.tax_amount') }}"
                value="{{ old('tax_amount', $order['tax_amount']) }}" type="text" placeholder="ex: 10.10"
                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

            {{-- Address --}}
            <x-adminlte-input name="address" label="{{ __('order.address') }}"
                value="{{ old('address', $order['address']) }}" type="text" placeholder="ex: 350 E Broad St...."
                fgroup-class="col-md-12" />

            {{-- Shipping Area  --}}
            <x-adminlte-select name="shipping_area_id" label="{{ __('order.shipping_area_id') }}" fgroup-class="col-md-6">
                <option value="" selected>-- {{ __('actions.choose') }} --</option>
                @if (!empty($getData['shipping_areas']) && isset($getData['shipping_areas']))
                    @foreach ($getData['shipping_areas'] as $shipping)
                        <option @if (old('shipping_area_id', $order['shipping_area_id']) == $shipping->id) selected="selected" @endif value="{{ $shipping->id }}">
                            {{ $shipping->name }} ➜ ( {{ $shipping->fee }} )</option>
                    @endforeach
                @else
                    <div class="alert alert-secondary" role="alert">
                        {{ __('actions.dont_have_data') }}
                    </div>
                @endif
            </x-adminlte-select>

            {{-- User  --}}
            <x-adminlte-select name="user_id" label="{{ __('order.user_id') }}" fgroup-class="col-md-6">
                <option value="" selected>-- {{ __('actions.choose') }} --</option>
                @if (!empty($getData['users']) && isset($getData['users']))
                    @foreach ($getData['users'] as $user)
                        <option @if (old('user_id', $order['user_id']) == $user->id) selected="selected" @endif value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach
                @else
                    <div class="alert alert-secondary" role="alert">
                        {{ __('actions.dont_have_data') }}
                    </div>
                @endif
            </x-adminlte-select>

            {{-- <x-image-preview name='image' /> --}}

        </div>

        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit"
            label="{{ __('actions.Save') }}" />
    </form>

@stop
@push('js')
    <script>
        const codeElement = document.querySelector('input[name=transaction_reference]');
        const generateCodeElement = document.querySelector('#generate-TxRef');

        generateCodeElement.addEventListener('click', insertCode);



        async function insertCode() {
            const transaction_reference = generateTxRefCode();
            const is_exist = await checkCodeAvailable(checkCodeUrl, transaction_reference);

            if (!is_exist) {
                codeElement.value = transaction_reference;
            }
        }

        const checkCodeUrl = "{{ route('order.check.code') }}";
        async function checkCodeAvailable(url, transaction_reference) {
            const response = await fetch(url);
            const data = await response.json();
            return data.data.is_exist;
        }

        function generateTxRefCode() {
            const prefix = "TxRef.";
            const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let transaction_reference = prefix;


            for (let i = 0; i < 6; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                transaction_reference += characters.charAt(randomIndex);
            }
            return transaction_reference;
        }
    </script>
@endpush
