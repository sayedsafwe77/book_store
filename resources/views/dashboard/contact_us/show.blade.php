@extends('dashboard.layout')

@section('title', 'Dashboard')


@section('content')
    <h1>{{$contact_us->name}}</h1>
    <h2>{{$contact_us->email}}</h2>
    <h3>{{$contact_us->message}}</h3>
@stop
