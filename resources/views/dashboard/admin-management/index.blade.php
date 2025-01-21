@extends('dashboard.layout')
@section('title', 'Admin Management')


@section('content_header')
    <x-header :title="__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))">
        <x-slot:actions>
            <a href="{{ route('dashboard.admin.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.admin-management.partials.filter')
@stop

@section('content')
    <div class="d-flex col-3 justify-content-around my-2">
        <x-delete-selected model="Admin" />
        <x-import-excel model="Admin" />
        <x-export-excel model="Admin" />
    </div>

    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>{{__('admins.id')}}</th>
                <th>{{__('admins.image')}}</th>  
                <th>{{__('admins.name')}}</th>
                <th>{{__('admins.email')}}</th>
                <th>{{__('admins.type')}}</th>
                <th>{{ __('actions.created_at') }}</th>
                <th>{{ __('actions.updated_at') }}</th>
                <th>{{ __('actions.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td><input type="checkbox" class="row-checkbox" value="{{ $admin->id }}"></td>
                    <td> {{ $admin->id }}</td>
                    <td>
                        @if ($admin->getFirstMediaUrl('image','preview'))
                            <img src="{{ $admin->getFirstMediaUrl('image','preview')}}"
                                alt="Thumbnail"
                                style="width: 200px; height: 100px; object-fit: contain;">
                        @endif
                    </td>
                    <td> {{ $admin->name }}</td>
                    <td> {{ $admin->email  }}</td>
                    <td> {{ __('admins.'.str_replace('-','_',$admin->type))  }}</td>
                    <td> {{ $admin->created_at }}</td>
                    <td> {{ $admin->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'admin','resource' => $admin->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$admins->links()}}
@stop
