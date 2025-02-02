@extends('website.layouts.main')
@section('title', 'Book Store | Reset Password')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/forgetPassword.css') }}" />
@endpush
@section('content')
    <section class="main_bg py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('resetPassword') }}" class="login-form">
                        @csrf
                        <input hidden type="email" name="email" value="{{ $email }}" required />
                        <input hidden type="text" name="code" value="{{ $code }}" required />
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
                        <div class="d-flex flex-column gap-2 my-3">
                            <label for="email">Confirm password</label>
                            <div class="d-flex align-items-center input_container">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation" />
                                <i class="fa-regular fa-eye" id="togglePasswordConfirmation"></i>
                            </div>
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/togglePassword.js') }}"></script>
@endpush
