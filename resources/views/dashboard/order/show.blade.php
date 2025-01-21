@extends('dashboard.layout')

@section('title', 'Order Create')


@section('content')

    <div class="row">

        {{-- Order Number --}}
        <x-adminlte-input disabled name="number" label="{{ __('order.number') }}"
            value="{{ old('number', $order['number']) }}" type="text" placeholder="ex: TxRef.******"
            fgroup-class="col-md-4" />


        {{-- Transaction Reference --}}
        <x-adminlte-input disabled name="transaction_reference" label="{{ __('order.transaction_reference') }}"
            value="{{ old('transaction_reference', $order['transaction_reference']) }}" type="text"
            placeholder="ex: TxRef.******" fgroup-class="col-md-4" />


        {{-- Shipping Fee --}}
        <x-adminlte-input disabled name="shipping_fee" label="{{ __('order.shipping_fee') }}"
            value="{{ old('shipping_fee', $order['shipping_fee']) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-4" />


        {{-- Books Total --}}
        <x-adminlte-input disabled name="books_total" label="{{ __('order.books_total') }}"
            value="{{ old('books_total', $order['books_total']) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

        {{-- Total --}}
        <x-adminlte-input disabled name="total" label="{{ __('order.total') }}"
            value="{{ old('total', $order['total']) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

        {{-- Status --}}
        <x-adminlte-input disabled name="status" label="{{ __('order.status') }}"
            value="{{ old('status', $order->status) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />
        {{-- Payment Status --}}
        <x-adminlte-input disabled name="payment_status" label="{{ __('order.payment_status') }}"
            value="{{ old('payment_status', $order->payment_status) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />


        {{-- Payment Type --}}
        <x-adminlte-input disabled name="payment_type" label="{{ __('order.payment_type') }}"
            value="{{ old('payment_type', $order->payment_type) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />


        {{-- Tax Amount --}}
        <x-adminlte-input disabled name="tax_amount" label="{{ __('order.tax_amount') }}"
            value="{{ old('tax_amount', $order['tax_amount']) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

        {{-- Address --}}
        <x-adminlte-input disabled name="address" label="{{ __('order.address') }}"
            value="{{ old('address', $order['address']) }}" type="text" placeholder="ex: 350 E Broad St...."
            fgroup-class="col-md-12" />

        {{-- Shipping Area  --}}
        <x-adminlte-input disabled name="shipping_area_id" label="{{ __('order.shipping_area_id') }}"
            value="{{ old('shipping_area_id', $order->shippingArea->name) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

        {{-- User  --}}
        <x-adminlte-input disabled name="user_id" label="{{ __('order.user_id') }}"
            value="{{ old('user_id', $order->user->name) }}" type="text" placeholder="ex: 10.10"
            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

        {{-- <x-image-preview name='image' /> --}}

    </div>



@stop
