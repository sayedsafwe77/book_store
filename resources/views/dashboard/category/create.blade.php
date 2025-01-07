@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category -> create</h1>
@stop

@section('content')
    <form action="{{route('dashboard.category.store')}}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="name" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>
        </div>
    </form>

    @stop
