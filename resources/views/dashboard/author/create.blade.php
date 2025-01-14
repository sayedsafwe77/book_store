@extends('dashboard.layout')

@section('title', 'author')


@section('content')
    <form action="{{route('dashboard.author.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="{{__('author.name')}}" value="{{ old('name')}}" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />
        </div>
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
