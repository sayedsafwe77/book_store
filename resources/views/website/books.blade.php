@extends('website.layouts.main')
@section('title', 'Book Store | Home')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/books.css') }}" />
@endpush
@section('content')
    <section class="library my-5">
        <div class="container">
            @livewire(BookFilter::class)
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/books.js') }}"></script>
@endpush
