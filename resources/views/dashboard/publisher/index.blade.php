@extends('dashboard.layout')
@section('title', 'Category')

@section('content_header')
    <x-header :title="__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))">
        <x-slot:actions>
            <a href="{{ route('dashboard.publisher.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.publisher.partials.filter')
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('publisher.id') }}</th>
                <th>{{ __('publisher.name') }}</th>
                <th>{{ __('actions.created_at') }}</th>
                <th>{{ __('actions.updated_at') }}</th>
                <th>{{ __('actions.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td> {{ $publisher->id }}</td>
                    <td> {{ $publisher->name }}</td>
                    <td> {{ $publisher->created_at }}</td>
                    <td> {{ $publisher->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'publisher','resource' => $publisher->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$publishers->links()}}
@stop
