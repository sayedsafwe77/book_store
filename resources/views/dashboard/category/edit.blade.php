@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category -> edit</h1>
@stop

@section('content')
    <form action="{{route('dashboard.category.update',$category->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="name" type="text" value="{{$category->name}}"
                fgroup-class="col-md-6" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>
        </div>
    </form>

    @stop
