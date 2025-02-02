@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">
                    {{ $discount->code }}
                    @if (\Carbon\Carbon::now()->lt(\Carbon\Carbon::parse($discount->expiry_date)))
                        <span class="badge bg-success">Active</span>
                        <br>
                        <strong>Time Remaining:</strong>
                        {{ \Carbon\Carbon::now()->diffForHumans(\Carbon\Carbon::parse($discount->expiry_date)) }}
                    @else
                        <span class="badge bg-danger">Expired</span>
                    @endif
                </h1>
            </div>
            <div class="card-body">
                <p><strong>Percentage:</strong> {{ $discount->percentage }}%</p>
                <p><strong>Expiry Date:</strong> {{ \Carbon\Carbon::parse($discount->expiry_date)->format('Y-m-d') }}</p>
                <p><strong>Quantity:</strong> {{ $discount->quantity }}</p>

                <h3>Categories:</h3>
                <div class="row">
                    @foreach($discount->categories as $category)
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card" style="width: 18rem;">
                                @if ($category->getFirstMediaUrl('image','preview'))
                                    <img src="{{ $category->getFirstMediaUrl('image','preview')}}"
                                        alt="Thumbnail"
                                        style="width: 200px; height: 100px; object-fit: contain;">
                                @endif
                                <div class="card-body">
                                    <p class="mb-2"><strong>Arabic Name:</strong>
                                        <span class="badge bg-primary">{{ $category->getTranslation('name','ar') }}</span>
                                    </p>
                                    <p><strong>English Name:</strong>
                                        <span class="badge bg-secondary">{{ $category->getTranslation('name','en') }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
