@extends('website.layouts.main')
@section('title', 'Book Store | Cart')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
@endpush
@section('content')
    @livewire('add-to-card-component', ['books' => $books, 'cart' => $cart, 'shipping_areas' => $shipping_areas])
@endsection
