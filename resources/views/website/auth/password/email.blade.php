@extends('website.layouts.main')
@section('title', 'Book Store | Forget Password')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/forgetPassword.css') }}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="py-4">
                <p class="text-center main_text fw-bold">Forget Password?</p>
                <p class="text-secondary text-center mt-2">
                    Enter your email to reset your password
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('sendOtp') }}" class="login-form">
                        @csrf
                        <div class="d-flex flex-column gap-2">
                            <label for="email">Email</label>
                            <div class="input_container">
                                <input type="email" name="email" placeholder="example@gmail.com" required />
                            </div>
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Send reset code
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
