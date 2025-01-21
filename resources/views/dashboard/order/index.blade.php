@extends('dashboard.layout')

@section('title', 'Order')

@section('content_header')
    <x-header title="{{ __('adminlte::adminlte.orders') }}">
        <x-slot:actions>
            <a href="{{ route('dashboard.order.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.order.partials.filters')
@stop
@section('content')
    <div class="d-flex col-3 justify-content-around my-2">
        <x-delete-selected model="Order" />
        <x-import-excel model="Order" />
        <x-export-excel model="Order" />
    </div>

    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>{{ __('order.id') }}</th>
                <th>{{ __('order.number') }}</th>
                <th>{{ __('order.books_total') }}</th>
                <th>{{ __('order.status') }}</th>
                <th>{{ __('order.address') }}</th>
                <th>{{ __('order.user_id') }}</th>
                <th>{{ __('actions.created_at') }}</th>
                <th>{{ __('actions.updated_at') }}</th>
                <th>{{ __('actions.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td><input type="checkbox" class="row-checkbox" value="{{ $order->id }}"></td>
                    <td> {{ $order->id }}</td>
                    <td> {{ $order->number }}</td>
                    <td> {{ $order->books_total }}</td>
                    <td> {{ $order->status }}</td>
                    <td> {{ Str::limit($order->address, 20) }}</td>
                    <td> {{ $order->user->name }}</td>
                    <td> {{ $order->created_at }}</td>
                    <td> {{ $order->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions', [
                            'resource_name' => 'order',
                            'resource' => $order->id,
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->appends(request()->query())->links()}}
@stop
