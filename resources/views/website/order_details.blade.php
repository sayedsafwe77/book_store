@extends('website.layouts.main')
@section('title','Book Store | Orders')
@push('css')
    <link rel="stylesheet" href="{{asset('css/orders.css')}}" />
@endpush
@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card" style="border-radius: 10px;">
            <div class="card-header px-4 py-5">
              <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;">{{$order->user->name}}</span>!</h5>
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
              </div>
              @foreach ($order->books as $book)

              <div class="card shadow-0 border mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="{{$book->getFirstMediaUrl('image')}}"
                        class="img-fluid" alt="Phone">
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0">{{$book->name}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{$book->author->name}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Qty: {{$book->pivot->quantity}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">${{$book->price * $book->pivot->quantity}}</p>
                    </div>
                  </div>
                  <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-2">
                      <p class="text-muted mb-0 small">Track Order</p>
                    </div>
                    <div class="col-md-10">
                      <div class="progress" style="height: 6px; border-radius: 16px;">
                        <div class="progress-bar" role="progressbar"
                          style="width: {{$order->status_percentage}}%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-around mb-1">
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach


              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Order Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">price</span> ${{$order->price_before_discount}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Invoice Number : {{$order->number}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> ${{$order->shipping_fee}}</p>
              </div>

              <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Invoice Date : {{$order->formatted_created_at}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">tax amount</span> ${{$order->tax_amount}}</p>
              </div>
              @if ($order->discount)
                <div class="d-flex justify-content-between mb-5">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> ${{$order->discount}}</p>
                </div>
              @endif

            </div>
            <div class="card-footer border-0 px-4 py-5"
              style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                paid: <span class="h2 mb-0 ms-2">${{$order->total}}</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
