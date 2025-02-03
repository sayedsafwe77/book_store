@extends('website.layouts.main')
@section('title', 'Book Store | Forget Password')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/resetPassword.css') }}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="py-4">
                <p class="text-center main_text fw-bold">Reset your password!</p>
                <p class="text-secondary text-center mt-2">
                    Enter the 4 digits code that you received on your email
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('checkOtp') }}" method="POST">
                        @csrf
                        <input hidden type="email" name="email" value="{{ $email }}" required />
                        <div class="d-flex  gap-2 ">
                            <div class="input_container w-25">
                                <input type="text" name="code1" maxlength="1" autofocus class="text-center"
                                    required />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code2" maxlength="1" class="text-center" required />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code3" maxlength="1" class="text-center" required />
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code4" maxlength="1" class="text-center" required />
                            </div>
                        </div>
                        @error('code1')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @error('code2')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @error('code3')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @error('code4')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/restPassword.js') }}"></script>
@endpush
