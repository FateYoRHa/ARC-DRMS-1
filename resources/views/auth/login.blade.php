@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card">
                <div class="login-img">
                    <img src="{{ secure_asset('images/ubseal.png') }}" alt="LOGO">
                </div>
                <h5 class="card-title text-center">UB ARC</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- <label for="email" class="col-md-4 col-form-label login-details">{{ __('Id Number') }}</label> -->
                        <div class="row mb-3">
                            <div class="col ">
                                <input id="idNumber" type="text" title="id number" class="form-control @error('idNumber') is-invalid @enderror login-details" name="idNumber" placeholder="ID number" value="{{ old('idNumber') }}" required autocomplete="idNumber" autofocus>
                                @error('idNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <label for="password" class="col-md-4 col-form-label login-details">{{ __('Password') }}</label> -->
                        <div class="row mb-3">
                            <div class="col input-group">
                                <input id="password" type="password" title="password" class="form-control @error('password') is-invalid @enderror login-details" name="password" placeholder="Password" required autocomplete="current-password">

                                <button class="btn btn-outline-dark" type="button" id="login-btn" onclick="changeVisibility(this)" title="show password"><span class="material-icons-outlined material-icons material-login">
                                        &#xe8f4
                                    </span>
                                </button>

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
                                <button type="submit" class="btn btn-primary" title="Login">
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