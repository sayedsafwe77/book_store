@extends('dashboard.layout')

@section('css')
    <style>
        .show-container {
            box-shadow: rgba(83, 158, 214, 0.15) 0px 2px 10px 0px;
            padding: 20px 15px;
            border-radius: 8px;
            background-color: #fff;
        }
        .show-container h5 {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .property-name {
            font-weight: 600;
        }
        .content-header {
            padding-bottom: 5px;
        }
        .bread-crumb {
            font-size: 16px;
        }

        .flash-sale-icon {
            font-size: 24px;
            color: #f39c12;
            position: relative;
            transition: color 0.3s;
        }
        .flash-sale-icon.fas.fa-bolt {
            animation: flash-sale-move 1.5s infinite ease-in-out;
        }
        @keyframes flash-sale-move {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(6px);
            }
        }
    </style>
@endsection

@section('title', 'Flash Sale Show')

@section('content_header')
    <h5 class="mb-0 mt-2 bread-crumb">
        <a href="{{ url('dashboard') }}">{{ __('actions.dashboard') }} /</a>
        <a href="{{ url('dashboard/flash_sale') }}">{{ __('flash_sale.model_name') }} /</a>
        {{ $flashSale->name }}
    </h5>
@stop

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="show-container">
                <h5><span class="property-name">{{ __('flash_sale.name') }}:</span> {{ $flashSale->name }}</h5>
                <h5><span class="property-name">{{ __('flash_sale.description') }}:</span> {{ $flashSale->description }}</h5>
                <h5><span class="property-name">{{ __('flash_sale.date') }}:</span> {{ $flashSale->date }}</h5>
                <h5><span class="property-name">{{ __('flash_sale.time') }}:</span> {{ $flashSale->time }} {{ __('flash_sale.time_identifier') }}</h5>
                <h5><span class="property-name">{{ __('flash_sale.is_active') }}:</span>
                    {{ $flashSale->is_active == 1 ? __('flash_sale.active_dropdown') : __('flash_sale.inactive_dropdown') }}
                    <i class=" flash-sale-icon {{ $flashSale->is_active ? 'fas fa-bolt' : '' }}"></i>
                </h5>
            </div>
        </div>
    </div>

@stop

