@extends('dashboard.layout')

@section('title', 'Dashboard')



@section('content')
    <form action="{{route('dashboard.admin.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-start">
            <x-adminlte-input name="name" label="{{__('admins.name')}}" type="text" placeholder="ex: Samir Gamal" value="{{old('name')}}"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="email"  label="{{__('admins.email')}}" type="email" placeholder="samirgamal@test.com" value="{{old('email')}}"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="password" label="{{__('admins.password')}}"  type="password" placeholder="Enter Password" value="{{old('password')}}"
                fgroup-class="col-md-6" />

            <x-adminlte-select name="type" label="{{__('admins.type')}}" fgroup-class="col-md-6"  >
                <option value="" disabled selected>{{__('admins.choose_type')}}</option>
                <option value="super-admin">{{__('admins.super_admin')}}</option>
                <option value="content-management">{{__('admins.content_management')}}</option>
            </x-adminlte-select>

            <x-image-preview name='image' />


        </div>
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop

