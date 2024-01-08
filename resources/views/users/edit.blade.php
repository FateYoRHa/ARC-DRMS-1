@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Modify') }}
                <ul>
                    <li>Viewer - <strong>View</strong> only</li>
                    <li>Uploader - <strong>Upload</strong> controls only</li>
                    <li>Admin/Administrator - <strong>Full</strong> control</li>
                    <li>Dean - <strong>Partial</strong> control (depending on their department)</li>
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
                                    <input id="name" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ $userQuery->username }}" required autocomplete="name" readonly>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-5 col-form-label text-md-end">{{ __('Id Number') }}</label>

                                <div class="col-md-6">
                                    <input id="idNumber" type="text"
                                        class="form-control @error('idNumber') is-invalid @enderror" name="idNumber"
                                        value="{{ $userQuery->idNumber }}" required autocomplete="idNumber" readonly>

                                    @error('idNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-5 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    @if ($userQuery->is_admin == '1')
                                        <input id="is_admin" type="text"
                                            class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                                            value="Admin" required autocomplete="is_admin" readonly>
                                    @elseif ($userQuery->is_admin == '2')
                                        <input id="is_admin" type="text"
                                            class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                                            value="Uploader" required autocomplete="is_admin" readonly>
                                    @elseif ($userQuery->is_admin == '3')
                                        <input id="is_admin" type="text"
                                            class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                                            value="Dean" required autocomplete="is_admin" readonly>
                                    @elseif ($userQuery->is_admin == null)
                                        <input id="is_admin" type="text"
                                            class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                                            value="Viewer" required autocomplete="is_admin" readonly>
                                    @else
                                        <input id="is_admin" type="text"
                                            class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                                            value="Error" required autocomplete="is_admin" readonly>
                                    @endif

                                    @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($userQuery->is_admin == '3')
                                <div class="row mb-3">
                                    <label for="department"
                                        class="col-md-5 col-form-label text-md-end">{{ __('Department') }}</label>

                                    <div class="col-md-6">
                                        <input id="is_admin" type="text"
                                            class="form-control @error('department') is-invalid @enderror" name="department"
                                            value="{{ $userQuery->department }}" required autocomplete="department"
                                            readonly>
                                    </div>
                                    @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif


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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addIdModal">
                                        {{ __('Make as Dean') }}
                                    </button>
                                    <button type="submit" class="btn btn-warning mt-2" name="viewer" value="viewer">
                                        {{ __('Make as Viewer') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addIdModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <select class="form-control" name="department" id="department">

                                            <option>Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->department_acronym }}">
                                                    {{ $department->department_acronym }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info" name="dean" value="dean">
                                        {{ __('Save') }}
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
