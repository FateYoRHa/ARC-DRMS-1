@extends('layouts.master')
@section('content')
        @if ($errors->any())
        <div class="alert alert-secondary fade show" role="alert" id="error-alert">

            @foreach ($errors->all() as $error)
            <span class="material-icons-round material-icons">
                error_outline
            </span> {{ $error }}
            @endforeach

        </div>
        {{-- @elseif (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div> --}}
        @endif
<div id="page-content-wrapper">
    <div  class="container-fluid">
        <div class="page-content-title">
            <h2>Department</h2>
        </div>
        {{-- <h5>Sort By</h5>
        <div class="row">
            <select data-column="4" class="form-control filter-select col-2">
                <option value="" selected="selected">Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->departmentID }}">{{ $department->department_acronym }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="table-responsive">
            <table class="table table-hover table-sm table-md datatable display compact" id="datatable-courses">
                <thead>
                    <tr>
                        <td hidden>Department ID</td>
                        <td>Department Acronym</td>
                        <td>Department</td>
                        <td>Created At</td>
                        <td>Updated At</td>
                        <td>Action
                            <button type="button" class="btn btn-success ml-5 float-lg-end" data-toggle="modal" data-target="#addIdModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('departments.add')
@include('departments.index_script')

@endsection
