@extends('dashboard.layout')

@section('title', 'Dashboard')



@section('content')
    <form action="{{route('dashboard.discount.store')}}" method="post">
        @csrf
        <div class="row justify-content-start">
            <x-adminlte-input name="code" label="{{__('adminlte::adminlte.code')}}" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />

            <div class="align-self-center">
                <p></p>
                <x-adminlte-button theme="outline-primary"  id="generate-code"  label="{{__('adminlte::adminlte.generate_discount_code')}}"/>
            </div>

            <x-adminlte-input name="quantity"  label="{{__('adminlte::adminlte.quantity')}}" type="number" placeholder="ex: 1 - 100"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="percentage" label="{{__('adminlte::adminlte.percentage')}}"  type="text" placeholder="ex: max-90"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="expiry_date"  label="{{__('adminlte::adminlte.expiry_date')}}" type="datetime-local"
                fgroup-class="col-md-6" />

            <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('adminlte::adminlte.Save')}}"/>
        </div>
    </form>

    @stop

