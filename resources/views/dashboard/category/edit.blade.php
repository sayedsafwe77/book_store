@extends('dashboard.layout')

@section('title', 'Dashboard')


@section('content')
    <form action="{{route('dashboard.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <x-adminlte-input name="name[en]" label="{{__('category.category_name_en')}}" value="{{$category->getTranslation('name','en')}}" type="text" placeholder="ex: ******"
            fgroup-class="col-md-4" />

            <x-adminlte-input name="name[ar]" label="{{__('category.category_name_ar')}}" value="{{$category->getTranslation('name','ar')}}" type="text" placeholder="ex: ******"
            fgroup-class="col-md-4" />

            <x-image-preview name='image' value="{{$category->getFirstMediaUrl('image')}}" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop
