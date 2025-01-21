@extends('dashboard.layout')

{{-- @section('title', 'contact_us') --}}


@section('content')
    <form action="{{route('dashboard.contact_us.store')}}" method="post">
        @csrf
        <div class="row">
                <x-adminlte-input name="name" label="{{__('contact_us.name')}}"  type="text" placeholder="ex: ******"
                fgroup-class="col-md-6" />
                <x-adminlte-input name="email" label="{{__('contact_us.email')}}"  type="text" placeholder="ex: ******"
                fgroup-class="col-md-6" />
                <x-adminlte-textarea name="message" label="{{__('contact_us.message')}}"  type="textarea" placeholder="ex: ******"
                fgroup-class="col-md-6" />
        </div>

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
