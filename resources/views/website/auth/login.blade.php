@extends('website.layouts.main')
@section('title', 'Book Store | Login')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <p class="text-center main_text fw-bold py-4">Welcome Back!</p>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('login') }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('postLogin') }}" class="login-form">
                        @csrf
                        <div class="d-flex flex-column gap-2">
                            <label for="email">Email</label>
                            <div class="input_container">
                                <input type="email" name="email" placeholder="example@gmail.com" />
                            </div>
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="d-flex flex-column gap-2 my-3">
                            <label for="email">Password</label>
                            <div class="d-flex align-items-center input_container">
                                <input type="password" name="password" id="password" placeholder="Enter password" />
                                <i class="fa-regular fa-eye" id="togglePassword"></i>
                            </div>
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items center mt-3">
                            <div>
                                <label for="rememberMe">Remember me</label>
                                <input type="checkbox" name="rememberme" id="rememberMe" />
                            </div>
                            <a href="{{route('showEnterEmail')}}" class="main_text">Forget password?</a>
                        </div>
                        @error('rememberme')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Log in
                            </button>
                        </div>
                    </form>
                    <p class="mt-4 text-center">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="main_text">Signup</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/togglePassword.js') }}"></script>
@endpush
