@extends('website.layouts.main')
@section('title', 'Book Store | Login')
@push('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
        <p class="text-center main_text fw-bold py-4">Welcome Back!</p>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
            <form method="POST" class="login-form">
                <div class="d-flex flex-column gap-2">
                <label for="email">Email</label>
                <div class="input_container">
                    <input type="text" placeholder="example@gmail.com" />
                </div>
                </div>
                <div class="d-flex flex-column gap-2 my-3">
                <label for="email">Password</label>
                <div class="d-flex align-items-center input_container">
                    <input type="text" placeholder="Enter password" />
                    <i class="fa-regular fa-eye"></i>
                </div>
                </div>
                <div
                class="d-flex justify-content-between align-items center mt-3"
                >
                <div>
                    <label for="rememberMe">Remember me</label>
                    <input type="checkbox" name="eememberme" id="rememberMe" />
                </div>
                <a href="forgetPassword.html" class="main_text"
                    >Forget password?</a
                >
                </div>
                <div>
                <button type="submit" class="main_btn w-100 mt-3">
                    Log in
                </button>
                </div>
            </form>
            <p class="mt-4 text-center">
                Don’t have an account?
                <a href="register.html" class="main_text">Signup</a>
            </p>
            </div>
        </div>
        </div>
    </section>
@endsection
