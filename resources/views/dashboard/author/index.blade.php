@extends('dashboard.layout')
@section('title', 'Author')

@section('content_header')
    <x-header :title="__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))">
        <x-slot:actions>
            <a href="{{ route('dashboard.author.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.author.partials.filter')
@stop

@session('success')
    {{ session('success') }}
@endsession

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('author.id') }}</th>
                <th>{{ __('author.name') }}</th>
                <th>{{ __('author.image') }}</th>
                <th>{{ __('actions.created_at') }}</th>
                <th>{{ __('actions.updated_at') }}</th>
                <th>{{ __('actions.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            
                <tr>
                    <td> {{ $author->id }}</td>
                    <td> {{ $author->name }}</td>
                    <td>
                       

                        @if ($author->getFirstMediaUrl('image','preview'))
                            <img src="{{asset('').parse_url($author->getFirstMediaUrl('image','preview'), PHP_URL_PATH)}}"
                                alt="Thumbnail"
                                style="width:50px; height:50px; object-fit: contain;">
                        @endif
                    </td>
                    <td> {{ $author->created_at }}</td>
                    <td> {{ $author->updated_at }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'author','resource' => $author->id])
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    {{$authors->links()}}
@stop
