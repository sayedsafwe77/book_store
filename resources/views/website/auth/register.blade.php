@extends('website.layouts.main')
@section('title', 'Book Store | Register')
@push('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
            <form method="POST" action="{{route('register')}}" class="login-form">
                @csrf
                <div class="d-flex gap-2 user-name">
                <div class="d-flex flex-column gap-2">
                    <label for="email">First Name</label>
                    <div class="input_container">
                    <input type="text" name="first_name" placeholder="John" />
                    </div>
                </div>

                <div class="d-flex flex-column gap-2">
                    <label for="email">Last Name</label>
                    <div class="input_container">`
                    <input type="text" name="last_name" placeholder="Smith" />
                    </div>
                </div>
                </div>
                <div class="d-flex flex-column gap-2 my-3">
                <label for="email">Email</label>
                <div class="input_container">
                    <input type="text" name="email" placeholder="example@gmail.com" />
                </div>
                </div>
                <div class="d-flex flex-column gap-2 my-3">
                <label for="email">Password</label>
                <div class="d-flex align-items-center input_container">
                    <input type="password" name="password" placeholder="Enter password" />
                    <i class="fa-regular fa-eye"></i>
                </div>
                </div>
                <div class="d-flex flex-column gap-2 my-3">
                <label for="email">Confirm password</label>
                <div class="d-flex align-items-center input_container">
                    <input type="password" name="password_confirmation" placeholder="Enter password" />
                    <i class="fa-regular fa-eye"></i>
                </div>
                </div>
                <div class="d-flex gap-1 align-items-center mt-3">
                <div class="d-flex gap-2">
                    <input type="checkbox" name="eememberme" id="rememberMe" />
                    <label for="rememberMe">Agree with</label>
                </div>
                <p class="main_text">Terms & Conditions</p>
                </div>
                <div>
                <button type="submit" class="main_btn w-100 mt-3">
                    Sign Up
                </button>
                </div>
            </form>
            <p class="mt-4 text-center">
                Already have an account?
                <a href="login.html" class="main_text">Login</a>
            </p>
            </div>
        </div>
        </div>
    </section>
@endsection
