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
    @endif
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <div class="page-content-title">
                        <h2>{{ $courseQuery->course_acronym }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addIdModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                        </button>
                    </div>
                    <div class="row">
                        <div class="">
                            <label for="">Course ID</label>
                            <p>{{ $courseQuery->courseID }}</p>
                        </div>
                        <div class="col-2">
                            <label for="">Course Acronym</label>
                            <p>{{ $courseQuery->course_acronym }}</p>
                        </div>
                        <div class="col-5">
                            <label for="">Course</label>
                            <p>{{ $courseQuery->course }}</p>
                        </div>
                        <div class="col-4">
                            <label for="">Department</label>
                            <p>{{ $courses->department }}</p>
                        </div>
                    </div>
                </div>
            </div>


            {{-- STUDENTS ENROLLED --}}

            <div class="table-responsive mt-5">

                <h5>Enrolled Students</h5>
                <table class="table table-hover table-sm table-md datatable display"
                    id="datatable-course">
                    <thead>
                        <tr>
                            <td hidden>Registration ID</td>
                            <td>Student ID</td>
                            <td>Name</td>
                            <td hidden>Registration ID</td>
                            <td hidden>Registration ID</td>
                            <td hidden>Registration ID</td>
                            <td>Enrolled At</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @include('courses.course_script')
    @include('courses.edit')
@endsection
