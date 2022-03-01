@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">{{ __('Reset Password') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('users.update', ['user' => $userQuery->user_id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$userQuery->username}}" required autocomplete="name" readonly>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-5 col-form-label text-md-end">{{ __('Id Number') }}</label>

                    <div class="col-md-6">
                        <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror" name="idNumber" value="{{$userQuery->idNumber}}" required autocomplete="idNumber" readonly>

                        @error('idNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection