<section class="my-5 py-5 payment-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="payment">
                    <p class="payment_title">Payment Summary</p>
                    <p class="payment_description description fs-6 mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Mauris et ultricies est. Aliquam in justo varius, sagittis
                        neque ut, malesuada leo.
                    </p>
                    <div class=" py-5">
                        <p class="fs-4 description mt-3">Have a discount code?</p>
                        <div class="d-flex gap-3 mt-3">
                            <form class="input_container w-50">
                                <img src="/images/ticket.png" alt="" />
                                <input type="text" placeholder="Enter Promo Code" />
                            </form>
                            <button class="cart_btn main_btn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="total p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-secondary fs-5">Subtotal</p>
                        <p class="fs-4 fw-bold">${{$total}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-secondary fs-5">Shipping</p>
                        <p class="fs-4 fw-bold">
                            <form action="{{route('order.create')}}" method="post">
                                @csrf
                            <select class="form-select" wire:change="updateShippingArea($event.target.value)" name="shipping_area_id" aria-label="Default select example" required>
                                <option selected disabled>select shipping area</option>
                                    @foreach ($shipping_areas as $shipping_area)
                                        <option value="{{$shipping_area->id}}">{{$shipping_area->name}}</option>
                                    @endforeach
                            </select>
                            <input type="hidden" name="tax_percentage" value="{{$tax_percentage}}" id="">
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <p class="text-secondary fs-5">Shipping Fee</p>
                        <p class="fs-4 fw-bold">${{$shipping_fee}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <p class="text-secondary fs-5">Address</p>
                        <p class="fs-4 fw-bold col-7">
                            @if ($user_addresses->count())
                                <select class="form-select my-2" wire:change="selectAddress($event.target.value)" name="address" aria-label="Default select example" required>
                                    <option selected disabled>select address</option>
                                        @foreach ($user_addresses as $user_address)
                                            <option value="{{$user_address->id}}">{{$user_address->address}}</option>
                                        @endforeach
                                </select>
                            @endif
                            @unless (!empty($address))
                                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="Enter new address for shipping">
                            @endunless
                        </p>
                    </div>
                    @unless (!empty($address))
                        <div class="d-flex justify-content-end  py-1">
                            <div class="form-check">
                                <input class="form-check-input" name="save_to_address" type="checkbox" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Save To Address
                                </label>
                            </div>
                        </div>
                    @endunless

                    <div class="d-flex justify-content-between align-items-center py-3">
                        <p class="text-secondary fs-5">Tax</p>
                        <p class="fs-4 fw-bold">${{$tax_amount}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-top py-3">
                        <p class="text-secondary fs-5">Total</p>
                        <p class="fs-3 fw-bold main_text">${{$total_with_tax}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-top py-3">
                        <p class="text-secondary fs-5">Payment Type</p>
                        <p class="fs-3 fw-bold main_text">
                            <div class="form-check">
                                <input class="form-check-input"  type="radio" name="payment_type" value="{{$cash}}" checked id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Cash
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_type" value="{{$visa}}" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Visa
                                </label>
                              </div>
                        </p>
                    </div>
                </div>
                <button class="main_btn w-100" type="submit">Check out</button>
                {{-- </form> --}}

                <button class="primary_btn w-100 mt-3">Keep Shopping</button>
            </div>
        </div>
    </div>
</section>
