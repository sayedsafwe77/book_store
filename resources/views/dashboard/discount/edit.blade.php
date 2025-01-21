@extends('dashboard.layout')


@section('title', 'Dashboard')


@section('content')
    <form action="{{route('dashboard.discount.update',$discount->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="code" label="{{__('discount.code')}}" type="text" value="{{$discount->code}}"
                fgroup-class="col-md-4" />

            <div class="align-self-center">
                <p></p>
                <x-adminlte-button theme="outline-primary"  id="generate-code"  label="{{__('discount.generate_discount_code')}}"/>
            </div>
            <x-adminlte-input name="quantity" label="{{__('discount.quantity')}}"  type="number" value="{{$discount->quantity}}"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="percentage" label="{{__('discount.percentage')}}"  type="text" value="{{$discount->percentage}}"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="expiry_date" label="{{__('discount.expiry_date')}}" type="datetime-local" value="{{$discount->expiry_date}}"
                fgroup-class="col-md-6" />


            <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.Save')}}"/>

            <x-adminlte-input name="discount_id" type="hidden" value="{{$discount->id}}"
                fgroup-class="col-md-12" />
        </div>
    </form>

    @stop

@section('js')
    <script>
        const checkCodeUrl = "{{route('discount.check.code')}}" ;
    </script>
    <script src="{{ asset('js/main.js')}}"></script>
@stop
