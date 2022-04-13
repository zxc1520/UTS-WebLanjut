@extends('layouts.master');

@section('content')
<section class="register-section">
    <div class="container">
        <form action="/register" method="POST">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" name="name" id="form2Example1" class="form-control @error('name')
                    is-invalid
                @enderror" required value="{{ old('name') }}" />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label class="form-label" for="form2Example1">Fullname</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control @error('email')
                    is-invalid
                @enderror" required value="{{ old('email') }}" />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" class="form-control @error('password')
                    is-invalid
                @enderror" required value="{{ old('password') }}" />
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Already a member? <a href="/login">Sign in</a></p>
            </div>
        </form>
    </div>

</section>
@endsection
