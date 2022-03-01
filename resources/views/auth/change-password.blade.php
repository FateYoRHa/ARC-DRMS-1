@extends('layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>

        <div class="page-content-title">
            <h2>Change Password</h2>
        </div>
        <hr />


        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('change.password') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-right">Current Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control  @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-right">New Password</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password" autocomplete="current-password">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-right">New Confirm Password</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" type="password" class="form-control  @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" autocomplete="current-password">
                            @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection