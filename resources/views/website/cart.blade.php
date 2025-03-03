@extends('website.layouts.main')
@section('title', 'Book Store | Cart')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
@endpush
@section('content')
    @livewire('cart-page-component',['books' => $books,'cart' => $cart])

@endsection
