@extends('adminlte::page')

@section('content_header')
    <ol class="breadcrumb">
        <h1>
            @foreach (generate_breadcrumbs() as $breadcrumb)
                    @if ($loop->last)
                        {{ __('adminlte::adminlte.' . strtolower($breadcrumb['text']) )}}
                    @else
                        <a href="{{ $breadcrumb['url'] }}">{{ __('adminlte::adminlte.' . $breadcrumb['text'] ) }} / </a>
                    @endif
            @endforeach
        </h1>

    </ol>
@stop

@section('css')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@stop

@push('js')
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script>
        const checkCodeUrl = "{{route('discount.check.code')}}" ;
    </script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush

