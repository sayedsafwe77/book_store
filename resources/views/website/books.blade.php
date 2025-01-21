@extends('website.layouts.main')
@section('title','Book Store | Home')
@push('css')
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
    <link rel="stylesheet" href="{{asset('css/books.css')}}" />

@endpush
@section('content')
<section class="library my-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Categories
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body d-flex flex-column gap-3">
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <input
                        type="checkbox"
                        name="categories"
                        id="categories"
                      />
                      <label for="categories">All Categories</label>
                    </div>
                    <p>(1450)</p>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <input type="checkbox" name="business" id="business" />
                      <label for="business">Business</label>
                    </div>
                    <p>(1450)</p>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <input type="checkbox" name="kids" id="kids" />
                      <label for="kids">Kids</label>
                    </div>
                    <p>(1450)</p>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <input type="checkbox" name="art" id="art" />
                      <label for="art">Art</label>
                    </div>
                    <p>(1450)</p>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <input type="checkbox" name="history" id="history" />
                      <label for="history">History</label>
                    </div>
                    <p>(1450)</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item my-3">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  Publisher
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong>
                  It is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the
                  showing and hiding via CSS transitions. You can modify any
                  of this with custom CSS or overriding our default variables.
                  It's also worth noting that just about any HTML can go
                  within the <code>.accordion-body</code>, though the
                  transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  Year
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the
                  showing and hiding via CSS transitions. You can modify any
                  of this with custom CSS or overriding our default variables.
                  It's also worth noting that just about any HTML can go
                  within the <code>.accordion-body</code>, though the
                  transition does limit overflow.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide swiper-slide_category active">
                Business
              </div>
              <div class="swiper-slide swiper-slide_category">Self Help</div>
              <div class="swiper-slide swiper-slide_category">History</div>
              <div class="swiper-slide swiper-slide_category">Romance</div>
              <div class="swiper-slide swiper-slide_category">Fantasy</div>
              <div class="swiper-slide swiper-slide_category">Art</div>
              <div class="swiper-slide swiper-slide_category">Kids</div>
              <div class="swiper-slide swiper-slide_category">Music</div>
              <div class="swiper-slide swiper-slide_category">Cooking</div>
            </div>
          </div>
          <div class="row books_book">
            <div class="col-lg-3">
              <div class="book_image">
                <img
                  src="./images/book-8.png"
                  alt="book image"
                  class="w-100"
                />
              </div>
            </div>
            <div class="col-12 col-lg-9">
              <div class="book_detailes">
                <div class="d-flex align-items-start book_detailes__content">
                  <div>
                    <p class="book_detailes__title">Rich Dad And Poor Dad</p>
                    <p class="book_detailes__description">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Mauris et ultricies est. Aliquam in justo varius,
                      sagittis neque ut, malesuada leo. Aliquam in justo
                      varius, sagittis neque ut, malesuada leo.
                    </p>
                  </div>
                  <div class="discount">
                    <p class="discount_code">25% Discount code: Ne212</p>
                  </div>
                </div>
                <div
                  class="d-flex flex-wrap justify-content-between align-items-end gap-4"
                >
                  <div>
                    <div class="book_stars">
                      <div class="d-flex gap-2 align-items-center">
                        <div>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                        </div>
                        <p class="book_stars__review">(210 Review)</p>
                      </div>
                      <p class="my-3 book_stars__review-rate">
                        Rate: <span class="text-dark">4.5</span>
                      </p>
                    </div>
                    <div class="d-flex gap-5">
                      <div>
                        <p class="author">Author</p>
                        <p class="author_name">Robert T. Kiyosaki</p>
                      </div>
                      <div>
                        <p class="year">Year</p>
                        <p>1999</p>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <div class="recommended_card__price">
                      <p class="text-end mb-4">$40.00</p>
                      <div
                        class="d-flex flex-wrap gap-5 mt-auto justify-content-end"
                      >
                        <button class="main_btn cart-btn w-50  flex-grow-1">
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
              </div>
            </div>
          </div>
          <div class="row books_book">
            <div class="col-lg-3">
              <div class="book_image">
                <img
                  src="./images/book-8.png"
                  alt="book image"
                  class="w-100"
                />
              </div>
            </div>
            <div class="col-12 col-lg-9">
              <div class="book_detailes">
                <div class="d-flex align-items-start book_detailes__content">
                  <div>
                    <p class="book_detailes__title">Rich Dad And Poor Dad</p>
                    <p class="book_detailes__description">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Mauris et ultricies est. Aliquam in justo varius,
                      sagittis neque ut, malesuada leo. Aliquam in justo
                      varius, sagittis neque ut, malesuada leo.
                    </p>
                  </div>
                  <div class="discount">
                    <p class="discount_code">25% Discount code: Ne212</p>
                  </div>
                </div>
                <div
                  class="d-flex flex-wrap justify-content-between align-items-end gap-4"
                >
                  <div>
                    <div class="book_stars">
                      <div class="d-flex gap-2 align-items-center">
                        <div>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                        </div>
                        <p class="book_stars__review">(210 Review)</p>
                      </div>
                      <p class="my-3 book_stars__review-rate">
                        Rate: <span class="text-dark">4.5</span>
                      </p>
                    </div>
                    <div class="d-flex gap-5">
                      <div>
                        <p class="author">Author</p>
                        <p class="author_name">Robert T. Kiyosaki</p>
                      </div>
                      <div>
                        <p class="year">Year</p>
                        <p>1999</p>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <div class="recommended_card__price">
                      <p class="text-end mb-4">$40.00</p>
                      <div
                        class="d-flex flex-wrap gap-3 mt-auto justify-content-end"
                      >
                        <button class="main_btn cart-btn w-50">
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
              </div>
            </div>
          </div>
          <div class="row books_book">
            <div class="col-lg-3">
              <div class="book_image">
                <img
                  src="./images/book-8.png"
                  alt="book image"
                  class="w-100"
                />
              </div>
            </div>
            <div class="col-12 col-lg-9">
              <div class="book_detailes">
                <div class="d-flex align-items-start book_detailes__content">
                  <div>
                    <p class="book_detailes__title">Rich Dad And Poor Dad</p>
                    <p class="book_detailes__description">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Mauris et ultricies est. Aliquam in justo varius,
                      sagittis neque ut, malesuada leo. Aliquam in justo
                      varius, sagittis neque ut, malesuada leo.
                    </p>
                  </div>
                  <div class="discount">
                    <p class="discount_code">25% Discount code: Ne212</p>
                  </div>
                </div>
                <div
                  class="d-flex flex-wrap justify-content-between align-items-end gap-4"
                >
                  <div>
                    <div class="book_stars">
                      <div class="d-flex gap-2 align-items-center">
                        <div>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                        </div>
                        <p class="book_stars__review">(210 Review)</p>
                      </div>
                      <p class="my-3 book_stars__review-rate">
                        Rate: <span class="text-dark">4.5</span>
                      </p>
                    </div>
                    <div class="d-flex gap-5">
                      <div>
                        <p class="author">Author</p>
                        <p class="author_name">Robert T. Kiyosaki</p>
                      </div>
                      <div>
                        <p class="year">Year</p>
                        <p>1999</p>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <div class="recommended_card__price">
                      <p class="text-end mb-4">$40.00</p>
                      <div
                        class="d-flex flex-wrap gap-3 mt-auto justify-content-end"
                      >
                        <button class="main_btn cart-btn w-50">
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
              </div>
            </div>
          </div>
          <div class="row books_book">
            <div class="col-lg-3">
              <div class="book_image">
                <img
                  src="./images/book-8.png"
                  alt="book image"
                  class="w-100"
                />
              </div>
            </div>
            <div class="col-12 col-lg-9">
              <div class="book_detailes">
                <div class="d-flex align-items-start book_detailes__content">
                  <div>
                    <p class="book_detailes__title">Rich Dad And Poor Dad</p>
                    <p class="book_detailes__description">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Mauris et ultricies est. Aliquam in justo varius,
                      sagittis neque ut, malesuada leo. Aliquam in justo
                      varius, sagittis neque ut, malesuada leo.
                    </p>
                  </div>
                  <div class="discount">
                    <p class="discount_code">25% Discount code: Ne212</p>
                  </div>
                </div>
                <div
                  class="d-flex flex-wrap justify-content-between align-items-end gap-4"
                >
                  <div>
                    <div class="book_stars">
                      <div class="d-flex gap-2 align-items-center">
                        <div>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                          <i class="fa-solid fa-star text-warning"></i>
                        </div>
                        <p class="book_stars__review">(210 Review)</p>
                      </div>
                      <p class="my-3 book_stars__review-rate">
                        Rate: <span class="text-dark">4.5</span>
                      </p>
                    </div>
                    <div class="d-flex gap-5">
                      <div>
                        <p class="author">Author</p>
                        <p class="author_name">Robert T. Kiyosaki</p>
                      </div>
                      <div>
                        <p class="year">Year</p>
                        <p>1999</p>
                      </div>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <div class="recommended_card__price">
                      <p class="text-end mb-4">$40.00</p>
                      <div
                        class="d-flex flex-wrap gap-3 mt-auto justify-content-end"
                      >
                        <button class="main_btn cart-btn w-50">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('js/books.js')}}"></script>
@endpush
