@extends('dashboard.layout')

@section('title', 'Edit Flash Sale')

@section('content_header')
    <h5 class="mb-0 mt-2 bread-crumb">
        <a href="{{ url('dashboard') }}">{{ __('actions.dashboard') }} /</a>
        <a href="{{ url('dashboard/flash_sale') }}">{{ __('flash_sale.model_name') }} /</a>
        {{ __('actions.edit') }}
    </h5>
@stop

@section('content')
<div class="custom-form">
    <form action="{{route('dashboard.flash_sale.update',$flashSale->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="name[en]" label="{{__('flash_sale.label_name')}}" type="text" placeholder="{{__('flash_sale.name_placeholder_en')}}" fgroup-class="col-md-6" value="{{$flashSale->getTranslation('name','en')}}" />
            <x-adminlte-input name="name[ar]" label="{{__('flash_sale.label_name_ar')}}" type="text" placeholder="{{__('flash_sale.name_placeholder_ar')}}" fgroup-class="col-md-6" value="{{$flashSale->getTranslation('name','ar')}}" />
        </div>

        <div class="row">
            <x-adminlte-input name="description[en]" label="{{__('flash_sale.label_description')}}" type="text" placeholder="{{__('flash_sale.description_placeholder_en')}}" fgroup-class="col-md-6" value="{{$flashSale->getTranslation('description','en')}}" />
            <x-adminlte-input name="description[ar]" label="{{__('flash_sale.label_description_ar')}}" type="text" placeholder="{{__('flash_sale.description_placeholder_ar')}}" fgroup-class="col-md-6" value="{{$flashSale->getTranslation('description','en')}}" />
        </div>

        <div class="row">
            <x-adminlte-input name="date" label="{{__('flash_sale.label_date')}}" type="date" fgroup-class="col-md-6" value="{{$flashSale->date}}" />
            <x-adminlte-input name="time" label="{{__('flash_sale.label_time')}}" type="number" placeholder="{{ __('flash_sale.time_placeholder') }}" fgroup-class="col-md-6" value="{{$flashSale->time}}" />
        </div>

        <div class="row">
            <x-adminlte-select name="is_active" label="{{ __('flash_sale.is_active') }}" fgroup-class="col-12">
                <option value="1" {{ $flashSale->is_active === 1 ? 'selected' : '' }}>{{ __('flash_sale.active_dropdown') }}</option>
                <option value="0" {{ $flashSale->is_active === 0 ? 'selected' : '' }}>{{ __('flash_sale.inactive_dropdown') }}</option>
            </x-adminlte-select>
        </div>

        <x-adminlte-button theme="outline-primary" class="mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>
</div>

    @stop