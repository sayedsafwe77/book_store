@extends('dashboard.layout')

@section('css')
    <style>
        .actions-th {
            padding-left: 45px !important;
        }
        .table {
            background-color: #fff;
        }
        .table thead th {
            border-bottom: 2px solid #bedaef;
            background-color: #e0edf7;
        }
        .table tbody tr td {
            vertical-align: middle; 
        }
        .flash-sale-icon {
            transition: transform 0.3s, color 0.3s;
        }
        .flash-sale-icon.fas.fa-bolt {
            animation: flash-sale-pulse 1.2s infinite ease-in-out;
        }
        @keyframes flash-sale-pulse {
            0%, 100% {
                transform: scale(1);
                color: #f39c12;
            }
            50% {
                transform: scale(1.2);
                color: #e74c3c;
            }
        }
        .card {
            box-shadow: rgba(83, 158, 214, 0.15) 0px 2px 10px 0px;
        }
    </style>
@endsection

@section('title', 'Flash Sale')

@section('content_header')
<x-header title="{{__('adminlte::adminlte.flash_sale')}}">
    <x-slot:actions>
        <a href="{{route('dashboard.flash_sale.create')}}" class="btn btn-success">
            <i class="fas fa-plus"></i>
            {{__('actions.create')}}
        </a>
    </x-slot:actions>
</x-header>
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@include('dashboard.flash_sale.partials.filters')
@stop


@section('content')
    <table class="table table-responsive">
        <thead class="test">
            <tr>
                <th width="3%">{{__('flash_sale.id')}}</th>
                <th width="14%">{{__('flash_sale.name')}}</th>
                <th width="14%">{{__('flash_sale.description')}}</th>
                <th width="13%">{{__('flash_sale.date')}}</th>
                <th width="13%">{{__('flash_sale.time')}}</th>
                <th width="13%">{{__('flash_sale.is_active')}}</th>
                <th width="14%">{{__('actions.created_at')}}</th>
                <th width="14%">{{__('actions.updated_at')}}</th>
                <th width="2%" class="actions-th">{{__('actions.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flash_sales as $flash_sale)
                <tr>
                    <td> {{ $flash_sale->id }}</td>
                    <td> {{ str($flash_sale->name)->words(2) }} </td>
                    <td> {{ str($flash_sale->description)->words(1) }}</td>
                    <td> {{ $flash_sale->date }}</td>
                    <td> {{ $flash_sale->time }}</td>
                    <td>
                        <span class="{{ $flash_sale->is_active ? 'text-success' : 'text-danger' }}">
                            <i class=" flash-sale-icon {{ $flash_sale->is_active ? 'fas fa-bolt' : '' }}"></i>
                            {{ __('flash_sale.' . ($flash_sale->is_active ? 'active_dropdown' : 'inactive_dropdown')) }}
                        </span>
                    </td>
                    <td> {{ $flash_sale->created_at->diffForHumans() }}</td>
                    <td> {{ $flash_sale->updated_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'flash_sale','resource' => $flash_sale->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$flash_sales->links()}}
@stop
{{-- @push('js')
<script>
    Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
        });
    }
    });
</script>
@endpush --}}
