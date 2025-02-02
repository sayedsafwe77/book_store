@extends('dashboard.layout')

@section('title', 'Dashboard')


@section('content')
    <form action="{{route('dashboard.category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name[en]" label="{{__('category.category_name_en')}}" value="{{ old('name.en')}}" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />
            <x-adminlte-input name="name[ar]" label="{{__('category.category_name_ar')}}" value="{{ old('name.ar')}}" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />



            <x-image-preview name='image' />
        </div>

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
