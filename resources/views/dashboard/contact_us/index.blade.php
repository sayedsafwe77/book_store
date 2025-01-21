@extends('dashboard.layout')

@section('content_header')
<x-header title="{{__('adminlte::adminlte.contact_us')}}">
    <x-slot:actions>
        <a href="{{route('dashboard.contact_us.create')}}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i>
            {{__('actions.create')}}
        </a>
    </x-slot:actions>
</x-header>
{{-- <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@include('dashboard.contact_us.partials.filters') --}}
@stop


@section('content')

<div class="d-flex col-3 justify-content-around my-2">
    <x-delete-selected model="ContactUs" />
</div>

<table class="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="select-all"></th>
            <th>{{__('contact_us.id')}}</th>
            <th>{{__('contact_us.name')}}</th>
            <th>{{__('contact_us.email')}}</th>
            <th>{{__('contact_us.message')}}</th>
            <th>{{__('actions.created_at')}}</th>
            <th>{{__('actions.updated_at')}}</th>
            <th>{{__('actions.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact_us)
            <tr>
                <td><input type="checkbox" class="row-checkbox" value="{{ $contact_us->id }}"></td>
                <td> {{ $contact_us->id }}</td>
                <td> {{ $contact_us->name }}</td>
                <td> {{ $contact_us->email }}</td>
                <td> {{ $contact_us->message }}</td>
                <td> {{ $contact_us->created_at}}</td>
                <td> {{ $contact_us->updated_at }}</td>
                <td class="d-flex">
                    <a href="{{route('dashboard.contact_us.show',$contact_us->id)}}" class="btn btn-outline-primary">{{ __('actions.view')}}</a>
                <form action="{{route('dashboard.contact_us.destroy',$contact_us->id)}}" id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-adminlte-button theme="outline-danger" type="submit" id="delete-btn" label="{{ __('actions.delete')}}"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$contacts->links()}}
@stop
