@extends('dashboard.layout')

@section('title', 'Dashboard')


@section('content')
    <form action="{{route('dashboard.publisher.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="{{__('publisher.name')}}" value="{{ old('name')}}" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />
        </div>

        <x-image-preview name='image' />
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
