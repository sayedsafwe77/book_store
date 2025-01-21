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
    <table class="table table-responsive"  >
        <thead>
            <tr>
                <th>{{ __('book.id')}}</th>
                <th>{{ __('book.name')}}</th>
                <th>{{ __('book.slug')}}</th>
                <th>{{ __('book.image')}}</th>
                <th>{{ __('book.quantity')}}</th>
                <th>{{ __('book.publish_year')}}</th>
                <th>{{ __('book.price')}}</th>
                <th>{{ __('book.is_available')}}</th>
                <th>{{ __('book.category')}}</th>
                <th>{{ __('actions.created_at')}}</th>
                <th>{{ __('actions.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td> {{ $book->id }}</td>
                    <td> {{ $book->name }}</td>
                    <td> {{ $book->slug }}</td>
                    <td> {{ $book->image }}</td>
                    <td> {{ $book->quantity }}</td>
                    <td> {{ $book->publish_year }}</td>
                    <td> {{ $book->price }}</td>
                    <td> {{ ($book->is_available)? 'yes' : 'no' }}</td>
                    <td> {{ $book->category->name }}</td>

                    <td> {{ $book->created_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        @include('dashboard.partials.actions',['resource_name' => 'book','resource' => $book->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$books->links()}}
@stop
