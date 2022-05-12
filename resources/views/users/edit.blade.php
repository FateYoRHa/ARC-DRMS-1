@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">{{ __('Modify') }}
            <ul>
                <li>Viewer - <strong>View</strong> only</li>
                <li>Uploader - <strong>Upload</strong> controls only</li>
                <li>Admin/Administrator - <strong>Full</strong> control</li>
            </ul>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('users.update', ['user' => $userQuery->user_id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col">
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
                        <div class="row mb-3">
                            <label for="email" class="col-md-5 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                @if ($userQuery->is_admin == '1')
                                <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="Admin" required autocomplete="is_admin" readonly>
                                @elseif ($userQuery->is_admin == '2')
                                <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="Uploader" required autocomplete="is_admin" readonly>
                                @elseif ($userQuery->is_admin == null)
                                <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="Viewer" required autocomplete="is_admin" readonly>
                                @else
                                <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="Error" required autocomplete="is_admin" readonly>
                                @endif

                                @error('is_admin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="card-subtitle mb-2 text-muted">Controls:</div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-secondary" name="admin" value="admin">
                                    {{ __('Make as Admin') }}
                                </button>
                                <button type="submit" class="btn btn-dark" name="uploader" value="uploader">
                                    {{ __('Make as Uploader') }}
                                </button>
                                <button type="submit" class="btn btn-info" name="viewer" value="viewer">
                                    {{ __('Make as Viewer') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection