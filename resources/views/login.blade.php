@extends('layouts.master')

@section('content')
<section class="login-section">
    <div class="container">
        @if(session()->has('regSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('regSuccess') }}
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger" role="alert">
            {{ session('loginError') }}
        </div>
        @endif
        <form action="/login" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                @error('email')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <label class="form-label" for="email">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="/register">Register</a></p>

            </div>
        </form>
    </div>


    @include('sweetalert::alert')

</section>

@endsection
