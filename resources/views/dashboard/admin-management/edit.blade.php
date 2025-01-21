@extends('dashboard.layout')

@section('title', 'Dashboard')



@section('content')
    <form action="{{route('dashboard.admin.update',$admin->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row justify-content-start">
            <x-adminlte-input name="name" label="{{__('admins.name')}}" type="text" placeholder="ex: Samir Gamal" value="{{$admin->name}}"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="email"  label="{{__('admins.email')}}" type="email" placeholder="samirgamal@test.com" value="{{$admin->email}}"
                fgroup-class="col-md-6" />


            <x-adminlte-input name="password" label="{{__('admins.new_password')}}"  type="password" placeholder="Enter Password" value="{{old('password')}}"
                fgroup-class="col-md-6" />
            <x-adminlte-input name="password_confirmation" label="{{__('admins.confirm_new_password')}}"  type="password" placeholder="Confirm Password" value="{{old('password_confirmation')}}"
                fgroup-class="col-md-6" />

            <x-adminlte-select name="type" label="{{__('admins.type')}}" fgroup-class="col-md-6"  >
                <option value="" disabled selected>{{__('admins.choose_type')}}</option>
                <option @selected($admin->type == 'super-admin') value="super-admin">{{__('admins.super_admin')}}</option>
                <option @selected($admin->type == 'content-management') value="content-management">{{__('admins.content_management')}}</option>
            </x-adminlte-select>

            <div class="col-md-12">
            <x-image-preview name='image' value="{{$admin->getFirstMediaUrl('image')}}" />
        </div>

        </div>
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @stop

