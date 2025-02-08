@extends('website.layouts.main')
@section('title','Book Store | Home')
@push('css')
    <link rel="stylesheet" href="./css/home.css" />
@endpush
@section('hero_content')
<div class="search">
    <form action="POST">
      <div class="search_input">
        <input type="text" placeholder="Search" />
        <button class="search_btn">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </form>
  </div>
@endsection
@section('content')
<section class="main_bg py-5">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="feature">
            <div class="feature_icon">
              <img src="./images/shipping.png" alt="" />
            </div>
            <div class="feature_title">
              <h1>Fast & Reliable Shipping</h1>
            </div>
            <div class="feature_description">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris et ultricies est. Aliquam in justo varius, sagittis
                neque ut, malesuada leo.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="feature">
            <div class="feature_icon">
              <img src="./images/credit-card-buyer.png" alt="" />
            </div>
            <div class="feature_title">
              <h1>Secure Payment</h1>
            </div>
            <div class="feature_description">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris et ultricies est. Aliquam in justo varius, sagittis
                neque ut, malesuada leo.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="feature">
            <div class="feature_icon">
              <img src="./images/restock.png" alt="" />
            </div>
            <div class="feature_title">
              <h1>Easy Returns</h1>
            </div>
            <div class="feature_description">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris et ultricies est. Aliquam in justo varius, sagittis
                neque ut, malesuada leo.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="feature">
            <div class="feature_icon">
              <img src="./images/user-headset.png" alt="" />
            </div>
            <div class="feature_title">
              <h1>24/7 Customer Support</h1>
            </div>
            <div class="feature_description">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris et ultricies est. Aliquam in justo varius, sagittis
                neque ut, malesuada leo.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="best_seller">
    <!-- <div class="container">
      <div class="best_seller-head">
        <h2>Best Seller</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
          ultricies est. Aliquam in justo varius, sagittis neque ut, malesuada
          leo.
        </p>
      </div>
    </div>
    <div id="splide-marquee" class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide">
            <img src="./images/book-1.jpg" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-2.png" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-3.jpg" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-4.jpg" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-5.jpg" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-6.jpg" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-7.png" alt="" />
          </li>
          <li class="splide__slide">
            <img src="./images/book-8.png" alt="" />
          </li>
        </ul>
      </div>
    </div> -->
    <div class="container">
  <div class="best_seller-head">
    <h2>Best Seller</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
      ultricies est. Aliquam in justo varius, sagittis neque ut, malesuada
      leo.
    </p>
  </div>
</div>

<div id="splide-marquee" class="splide">
  <div class="splide__track">
    <ul class="splide__list">
      @foreach ($bestSellingBooks as $book)
        <li class="splide__slide">
          <img src="{{ $book->getFirstMediaUrl('image') }}" alt="{{ $book->name }}" />
          <p>{{ $book->name }}</p>
          <p>{{ $book->total_quantity_sold }} sold</p>
        </li>
      @endforeach
    </ul>
  </div>
</div>

    <div class="shop d-flex justify-content-center">
      <button class="main_btn shop_btn">Shop now</button>
    </div>
  </section>
  @if($recommended_books)
  <section class="recommended my-5 py-5 border-bottom">
    <div class="container">
      <p class="recommended_title mb-5">Recomended For You</p>
      <div class="row g-4">
        @foreach ($recommended_books as $recommended_book)
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="recommended_card d-flex gap-4 p-4">
              <div class="recomended_card__image">
                <img src="{{$recommended_book->getFirstMediaUrl('image')}}" alt="" class="w-100 h-100" />
              </div>
              <div class="d-flex flex-column gap-2">
                <div class="recommended_card__content">
                  <h3>{{ $recommended_book->name }}</h3>
                  <p class="recommended_author">
                    <span>Author:</span> {{$recommended_book->author->name}}
                  </p>
                  <p class="recommended_description">
                    {{$recommended_book->description}}
                  </p>
                </div>
                <div
                  class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center"
                >
                  <div>
                    <div class="stars d-flex gap-1">
                      <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                      <p class="review">(180 Review)</p>
                    </div>
                    <p class="rate"><span> Rate : </span> {{$recommended_book->rate}}</p>
                  </div>
                  <div class="recommended_card__price">
                    <p>${{$recommended_book->price}}</p>
                  </div>
                </div>
                <div class="d-flex flex-wrap gap-3 mt-auto">
                  <button class="main_btn cart-btn">
                    <span>Add To Cart</span>
                    <i class="fa-solid fa-cart-shopping"></i>
                  </button>
                  <button class="primary_btn">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif


  <section class="flash-sale my-5 py-5 border-bottom">
  <div class="container">
    <p class="recommended_title mb-5">Flash Sale</p>
    <div class="row g-4">

      @foreach ($books as $book)
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="recommended_card d-flex gap-4 p-4">
            <div class="recomended_card__image">
              <img src="{{ $book->getFirstMediaUrl('image') }}" alt="book image" class="w-100 h-100" />
            </div>
            <div class="d-flex flex-column gap-2">
              <div class="recommended_card__content">
                <h3>{{ $book->title }}</h3>
                <p class="recommended_author">
                  <span>Author:</span> {{ $book->author->name }}
                </p>
                <p class="recommended_description">
                  {{ $book->description }}
                </p>
              </div>
              <div class="recommended_card__rate d-flex flex-wrap justify-content-between align-items-center">
                <div>
                  <div class="stars d-flex gap-1">
                    <div>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review">(180 Reviews)</p>
                  </div>
                  <p class="rate"><span>Rate:</span> 4.2</p>
                </div>
                <div class="recommended_card__price">
                  <p>${{ $book->price }}</p>
                </div>
              </div>

              <div class="d-flex flex-wrap gap-3 mt-auto">
                @if ($book->quantity)
                  <form action="{{ route('cart.add', $book->id) }}" method="post">
                    @csrf
                    <button class="main_btn cart-btn">
                      <span>Add To Cart</span>
                      <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                  </form>
                @else
                  <p>Not Available</p>
                @endif
                @livewire('wish-list' , ['book' => $book])
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>



@endsection
@push('js')
    <script src="./js/home.js"></script>
    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
@endpush
