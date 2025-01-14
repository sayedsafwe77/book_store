@extends('dashboard.layout')

@section('content_header')
<x-header title="{{__('adminlte::adminlte.flash_sale')}}">
    <x-slot:actions>
        <a href="{{route('dashboard.flash_sale.create')}}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i>
            {{__('actions.create')}}
        </a>
    </x-slot:actions>
</x-header>
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@include('dashboard.flash_sale.partials.filters')
@stop


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{__('flash_sale.id')}}</th>
                <th>{{__('flash_sale.name')}}</th>
                <th>{{__('flash_sale.description')}}</th>
                <th>{{__('flash_sale.date')}}</th>
                <th>{{__('flash_sale.time')}}</th>
                <th>{{__('flash_sale.is_active')}}</th>
                <th>{{__('actions.created_at')}}</th>
                <th>{{__('actions.updated_at')}}</th>
                <th>{{__('actions.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flash_sales as $flash_sale)
                <tr>
                    <td> {{ $flash_sale->id }}</td>
                    <td> {{ $flash_sale->name }}</td>
                    <td> {{ $flash_sale->description }}</td>
                    <td> {{ $flash_sale->date }}</td>
                    <td> {{ $flash_sale->time }}</td>
                    <td> {{ $flash_sale->is_active }}</td>
                    <td> {{ $flash_sale->created_at }}</td>
                    <td> {{ $flash_sale->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'flash_sale','resource' => $flash_sale->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
