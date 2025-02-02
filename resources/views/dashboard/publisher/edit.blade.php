@extends('dashboard.layout')

@section('title', 'Dashboard')


@section('content')
    <form action="{{route('dashboard.publisher.update',$publisher->id)}}" method="post" >
        @csrf
        @method('PUT')
            <x-adminlte-input name="name" label="{{__('publisher.name')}}" value="{{$publisher->name}}" type="text" placeholder="ex: ******"
            fgroup-class="col-md-4" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
