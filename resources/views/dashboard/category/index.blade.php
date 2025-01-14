@extends('dashboard.layout')
@section('title', 'Category')

@section('content_header')
    <x-header :title="__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))">
        <x-slot:actions>
            <a href="{{ route('dashboard.category.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.category.partials.filter')
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('category.id') }}</th>
                <th>image</th>
                <th>{{ __('category.category_name_en') }}</th>
                <th>{{ __('category.category_name_ar') }}</th>
                <th>{{ __('category.discount') }}</th>
                <th>{{ __('actions.created_at') }}</th>
                <th>{{ __('actions.updated_at') }}</th>
                <th>{{ __('actions.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td>
                        @if ($category->getFirstMediaUrl('image','preview'))
                            <img src="{{ $category->getFirstMediaUrl('image','preview')}}"
                                alt="Thumbnail"
                                style="width: 200px; height: 100px; object-fit: contain;">
                        @endif
                    </td>
                    <td> {{ $category->getTranslation('name','en') }}</td>
                    <td> {{ $category->getTranslation('name','ar') }}</td>
                    <td> {{ $category->discount?->code  }}</td>
                    <td> {{ $category->created_at }}</td>
                    <td> {{ $category->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'category','resource' => $category->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@stop
