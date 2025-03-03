@extends('website.layouts.main')
@section('title','Book Store | Orders')
@push('css')
    <link rel="stylesheet" href="{{asset('css/orders.css')}}" />
@endpush
@section('content')
    <main>
        <section>
        <div class="container">
            <div class="row">
            <ul class="nav nav-pills gap-3 my-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                <button
                    class="nav-link nav-order active"
                    id="pills-home-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-home"
                    type="button"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
                >
                    Home
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button
                    class="nav-link nav-order"
                    id="pills-profile-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-profile"
                    type="button"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
                >
                    In Progress
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button
                    class="nav-link nav-order"
                    id="pills-contact-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-contact"
                    type="button"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
                >
                    Completed
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button
                    class="nav-link nav-order"
                    id="pills-contact-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-canceld"
                    type="button"
                    role="tab"
                    aria-controls="pills-canceld"
                    aria-selected="false"
                >
                    Canceled
                </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div
                class="tab-pane fade show active"
                id="pills-home"
                role="tabpanel"
                aria-labelledby="pills-home-tab"
                >
                <div class="order d-flex flex-column gap-3 my-3">
                    <div class="delete_order d-flex justify-content-end">
                    <i class="fa-solid fa-trash main_text"></i>
                    </div>
                    <div
                    class="d-flex justify-content-between align-items-center flex-wrap"
                    >
                    <p class="text-secondary">Order No.</p>
                    <p class="text-dark">{{$order->number}}</p>
                    </div>
                    <div
                    class="d-flex justify-content-between align-items-center flex-wrap"
                    >
                    <p class="text-secondary">Status</p>
                    <p class="text-dark">{{$order->status}}</p>
                    </div>
                    <div
                    class="d-flex justify-content-between align-items-center flex-wrap"
                    >
                    <p class="text-secondary">Date</p>
                    <p class="text-dark">{{$order->formatted_created_at}}</p>
                    </div>
                    <div
                    class="d-flex justify-content-between align-items-center flex-wrap"
                    >
                    <p class="text-secondary">Address</p>
                    <p class="text-dark">{{$order->address}}.</p>
                    </div>
                    <div
                    class="d-flex align-items-center justify-content-center my-3"
                    >
                    <div class="step active">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="line">
                        <!-- <i class="fa-solid fa-check"></i> -->
                    </div>
                    <div class="step">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="line">
                        <!-- <i class="fa-solid fa-check"></i> -->
                    </div>
                    <div class="step">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    </div>
                    <a
                    class="d-flex align-items-center gap-3 main_text single-order"
                  >
                    <p>View order detail</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
                </div>


                </div>


            </div>
            </div>
        </div>
        </section>
    </main>
@endsection
