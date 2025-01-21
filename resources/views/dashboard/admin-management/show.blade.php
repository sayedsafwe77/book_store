@extends('dashboard.layout')

@section('title', 'Admin Details')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card for Admin Details -->
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <h3 class="mb-0 font-weight-bold">{{__('admins.admin_details')}}</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <!-- Admin Avatar -->
                        @if ($admin->getFirstMediaUrl('image'))
                        <div class="col-md-4 text-center">
                            <div class="avatar-container mb-4">
                                <img 
                                    src="{{ $admin->getFirstMediaUrl('image') ? asset($admin->getFirstMediaUrl('image')) : asset('path/to/default-avatar.png') }}" 
                                    alt="Admin Avatar" 
                                    class="rounded-circle img-thumbnail shadow-sm" 
                                    style="width: 150px; height: 150px; object-fit: cover;"
                                >
                                <div class="status-indicator bg-success"></div>
                            </div>
                        </div>
                
                        @endif

                        <!-- Admin Information -->
                        <div class="col-md-8">
                            <h2 class="text-primary font-weight-bold mb-3">{{ $admin->name }}</h2>
                            <p class="text-muted mb-4">
                                <i class="fas fa-user-tag me-2"></i>
                                {{ ucfirst(str_replace('-', ' ', $admin->type)) }}
                            </p>

                            <!-- Details List -->
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span class="text-secondary">
                                        <i class="fas fa-envelope me-2"></i>
                                        <strong>{{__('admins.email')}}:</strong>
                                    </span>
                                    <span class="text-dark">{{ $admin->email }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="text-secondary">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        <strong>{{__('actions.created_at')}}:</strong>
                                    </span>
                                    <span class="text-dark">{{ $admin->created_at->format('d M Y, h:i A') }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="text-secondary">
                                        <i class="fas fa-clock me-2"></i>
                                        <strong>{{__('actions.updated_at')}}:</strong>
                                    </span>
                                    <span class="text-dark">{{ $admin->updated_at->format('d M Y, h:i A') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-light py-3 text-center">
                    <a href="{{ route('dashboard.admin.index') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>
                        {{__('admins.back_to_admins_list')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    /* Custom Styles */
    .card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        border-radius: 0.5rem 0.5rem 0 0;
    }

    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .status-indicator {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 2px solid white;
    }

    .list-unstyled li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }

    .list-unstyled li:last-child {
        border-bottom: none;
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
</style>
@endsection