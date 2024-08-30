@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex; /* Enables Flexbox layout */
            justify-content: center; /* Centers horizontally */
            align-items: center; /* Centers vertically */
            min-height: 100vh; /* Ensures the body takes full viewport height */
        }

        .container {
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height of the viewport */
        }

        .card {
            width: 100%;
            max-width: 400px; /* Adjust width as needed */
        }

        .card-header {
            background-color: #ff6347;
            border-radius: 8px 8px 0 0;
            padding: 15px;
            font-size: 24px;
            color: #e0e0e0;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            background-color: #333;
            color: #e0e0e0;
            border: 1px solid #555;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .form-control:focus {
            border-color: #ff6347;
            box-shadow: 0 0 5px rgba(255, 99, 71, 0.8); /* Glowing effect */
        }

        .btn-primary {
            background-color: #ff6347;
            color: #e0e0e0;
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            background-color: #e05040;
            box-shadow: 0 0 10px rgba(255, 99, 71, 1); /* Brighter glowing effect on hover */
        }

        .form-check-label {
            color: #e0e0e0;
        }

        .btn-link {
            color: #ff6347;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #e05040;
            text-decoration: underline;
        }

        .invalid-feedback {
            color: #ff6347;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
