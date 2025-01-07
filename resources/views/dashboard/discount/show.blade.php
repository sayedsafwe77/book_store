@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Discount -> {{ $discount->code }}</h1>
@stop

@section('content')
    <h1>{{$discount->code}}</h1>
@stop
