@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card">
                <div class="login-img">
                    <img src="{{ asset('images/ubseal.png') }}" alt="">
                </div>
                <h5 class="card-title text-center">UB ARC</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- <label for="email" class="col-md-4 col-form-label login-details">{{ __('Id Number') }}</label> -->
                        <div class="row mb-3">
                            <div class="col">
                                <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror login-details" name="idNumber" placeholder="ID number" value="{{ old('idNumber') }}" required autocomplete="idNumber" autofocus>

                                @error('idNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <label for="password" class="col-md-4 col-form-label login-details">{{ __('Password') }}</label> -->
                        <div class="row mb-3">
                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-details" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col login-details">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
<!-- 
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection