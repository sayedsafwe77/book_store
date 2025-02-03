<div class="row">
    <div class="col-12 col-lg-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Categories
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-column gap-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-3 align-items-center">
                                <input type="checkbox" name="categories" id="categories" />
                                <label for="categories">All Categories</label>
                            </div>
                            <p>({{ $this->categories->count() }})</p>
                        </div>
                        @foreach ($this->categories as $category)
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="checkbox" name="business" value="{{ $category->id }}" wire:model.live="categories_id" id="business" />
                                    <label for="business">{{$category->name}}</label>
                                </div>
                                <p>({{$category->books_count}})</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="accordion-item my-3">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Publisher
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Year
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
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
        @foreach ($books as $book)


            <div class="row books_book">
                <div class="col-lg-3">
                    <div class="book_image">
                        <img src="{{ $book->getFirstMediaUrl('image') }}" alt="book image" class="w-100" />
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="book_detailes">
                        <div class="d-flex align-items-start book_detailes__content">
                            <div>
                                <p class="book_detailes__title">{{ $book->title }}</p>
                                <p class="book_detailes__description">
                                    {{ $book->description }}
                                </p>
                            </div>
                            @php
                                $discount= $book->getValidDiscount();
                            @endphp
                            @if ($discount)
                                <div class="discount">
                                    <p class="discount_code">{{round($discount->percentage)}}%
                                        @if ($discount->code)
                                            Discount code: {{$discount->code}}</p>
                                        @endif
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-end gap-4">
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
                                        Rate: <span class="text-dark">{{ $book->rate }}</span>
                                    </p>
                                </div>
                                <div class="d-flex gap-5">
                                    <div>
                                        <p class="author">Author</p>
                                        <p class="author_name">{{ $book->author->name }}</p>
                                    </div>
                                    <div>
                                        <p class="year">Year</p>
                                        <p>{{ $book->publish_year }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="recommended_card__price">
                                    <p class="text-end mb-4">${{ $book->price }}</p>
                                    <div class="d-flex flex-wrap gap-5 mt-auto justify-content-end">
                                        @if ($book->quantity)
                                            @if (session()->get('cart')[$book->id] ?? false)
                                                <button  class="main_btn light cart-btn w-50 flex-grow-1">
                                                    <span>Added To Cart</span>
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            @else
                                                <form action="{{route('cart.add',$book->id)}}" class="w-50" method="post">
                                                    @csrf
                                                    <button  class="main_btn cart-btn w-100 flex-grow-1">
                                                        <span>Add To Cart</span>
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                        <p>not available</p>
                                        @endif
                                        @livewire('wish-list' , ['book' => $book])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$books->links()}}
    </div>
</div>
