@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content_header')
    <x-header :title="__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))">
        <x-slot:actions>
            <a href="{{ route('dashboard.discount.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    {{-- @include('dashboard.discount.partials.filter') --}}
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('discount.id')}}</th>
                <th>{{ __('discount.code')}}</th>
                <th>{{ __('discount.quantity')}}</th>
                <th>{{ __('discount.percentage')}}</th>
                <th>{{ __('discount.expiry_date')}}</th>
                <th>{{ __('actions.created_at')}}</th>
                <th>{{ __('actions.updated_at')}}</th>
                <th>{{ __('actions.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <td> {{ $discount->id }}</td>
                    <td> {{ $discount->code }}</td>
                    <td> {{ $discount->quantity }}</td>
                    <td> {{ $discount->percentage }}</td>
                    <td> {{ $discount->expiry_date }}</td>
                    <td> {{ $discount->created_at }}</td>
                    <td> {{ $discount->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'discount','resource' => $discount->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$discounts->links()}}
@stop
