@extends('dashboard.layout')

@section('title', 'author')


@section('content')
    <form action="{{route('dashboard.author.update',$author->id)}}" method="post" >
        @csrf
        @method('PUT')
            <x-adminlte-input name="name" label="{{__('author.name')}}" value="{{$author->name}}" type="text" placeholder="ex: ******"
            fgroup-class="col-md-4" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
