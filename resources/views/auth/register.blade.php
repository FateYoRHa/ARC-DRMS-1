@extends('layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">

            <div class="page-content-title">
                <h2>Register</h2>
            </div>
            <hr />
            <div class="container">
                <div class="card">
                    <div class="card-header text-muted">Default user role is a <strong>viewer</strong>. You can modify user
                        role after creating one.</div>
                    <div class="card-body register-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Id Number') }}</label>

                                <div class="col-md-6">
                                    <input id="idNumber" type="text"
                                        class="form-control @error('idNumber') is-invalid @enderror" name="idNumber"
                                        value="{{ old('idNumber') }}" required autocomplete="idNumber">

                                    @error('idNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="is_admin"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="is_admin" id="is_admin" aria-labelledby="is_admin" onchange="yesnoCheck(this);">
                                        <option value="{{ null }}">Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Uploader</option>
                                        <option value="3">Dean</option>
                                        <option value="">Viewer</option>
                                    </select>
                                </div>

                            </div>
                            <div id="ifDean" style="display: none;">
                                <div class="row mb-3">
                                    <label for="department"
                                        class="col-md-2 col-form-label text-md-end">{{ __('Department') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="department" id="department" aria-labelledby="department">
                                            <option selected>Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->department_acronym }}">{{ $department->department_acronym }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function yesnoCheck(that) {
            if (that.value == "3") {
                // alert("check");
                document.getElementById("ifDean").style.display = "block";
            } else {
                document.getElementById("ifDean").style.display = "none";
            }
        }
        
    </script>
@endsection
