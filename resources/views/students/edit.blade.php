@extends('layouts.master')

@section('content')
<style>
    .form-control:focus {
        border-color: #000;
        box-shadow: none;
    }
    .error {
        color: red;
        font-weight: 400;
        display: block;
        padding: 6px 0;
        font-size: 14px;
    }

    .form-control.error {
        border-color: red;
        padding: .375rem .75rem;
    }
</style>
<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <H1>EDIT STUDENT INFORMATION</H1>
        </div>
        <hr />

        <div class="position-fixed" style="z-index:1;">
            <a href="\students\{{ $studentQuery->registration_id }}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg></a>
        </div>



        <form action="{{ route('students.update', ['student' => $studentQuery->registration_id]) }}" method="POST" class="row g-3 mb-2" id="edit_student_form" enctype="multipart/form-data" onload="onLoadBody">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="primary-details row col-12 mt-5">
                <input type="number" id="registration_id" name="registration_id" class="form-control" value="{{$studentQuery->registration_id}}" disabled hidden>
                <input type="text" id="status" name="status" class="form-control" value="{{$studentQuery->status}}" hidden>
                {{-- <div class="col-md-2 profile-img">
                    <img src="{{ asset('images/blank-profile.png') }}" alt="" class="profile-img">
                </div> --}}
                {{-- <div class="col-md-10 row profile-details"> --}}

                    <div class="col">
                        <div class="card d-flex justify-content">
                            <div class="card-header">
                                <h3>
                                    {{-- NAME STUFF --}}
                                    <div class="row">
                                        <div class="col">
                                            <label for="lname">Last Name</label>
                                            <input class=" form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ $studentQuery->lname }}">
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="fname">First Name</label>
                                            <input class=" form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ $studentQuery->fname }}">
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="mname">Middle Name</label>
                                            <input class=" form-control @error('mname') is-invalid @enderror" type="text" name="mname" id="mname" value="{{ $studentQuery->mname }}">
                                            @error('mname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </h3>
                                {{-- END of NAME STUFF --}}
                                {{-- COURSES STUFF --}}
                                <h5>
                                    <label for="program">Course</label>
                                    <select class="col-3 form-control @error('program') is-invalid @enderror" name="program" id="program" aria-labelledby="program">

                                        @foreach ($courses as $course)
                                            @if ($course->course_acronym == $studentQuery->course)
                                                <option value="{{ $course->course_acronym }}" selected="selected">{{ $course->course_acronym }} - {{ $course->course }}</option>

                                            @else
                                                <option value="{{ $course->course_acronym }}">{{ $course->course_acronym }} - {{ $course->course }} </option>

                                            @endif
                                        @endforeach
                                    </select>
                                    @error('program')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </h5>
                                {{-- COURSES STUFF END --}}
                            </div>
                            <div class="card-body">
                                <h4 class="mt-4">Entrance Information</h4>
                                <table class="table table-sm table-md table-borderless" id="table-show-record">

                                    <tr>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Registration Number</label> </td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Entrance Status</label> </td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Student ID</label> </td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Current Status</label>  </td>
                                    </tr>
                                    <tr>
                                        <td><p>{{$studentQuery->registration_id}}</p></td>
                                        <td>
                                            {{-- ENTRANCE STATUS STUFF --}}
                                            <select class="col-6 form-control @error('entrance_status') is-invalid @enderror" name="entrance_status" id="entrance_status" aria-labelledby="program" value="">
                                                @foreach ($entrance_stat as $stat)
                                                    @if ($stat == $studentQuery->entrance_status)
                                                        <option selected value="{{ $studentQuery->entrance_status }}">
                                                            <p>@if ($studentQuery->entrance_status == "returning_first_year")
                                                                Incoming First Year(Old Student)
                                                            @elseif ($studentQuery->entrance_status == "incoming_first_year")
                                                                Incoming First Year
                                                            @else
                                                                Transferee
                                                            @endif</p>
                                                        </option>
                                                    @else
                                                        <option value="{{ $stat }}">
                                                            <p>@if ($stat == "returning_first_year")
                                                                Incoming First Year(Old Student)
                                                            @elseif ($stat == "incoming_first_year")
                                                                Incoming First Year
                                                            @else
                                                                Transferee
                                                            @endif</p>
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('entrance_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- ENTRANCE STATUS STUFF END --}}
                                        </td>
                                        {{-- STUDENT ID STUFF --}}
                                        @if ($studentQuery->student_id == "")
                                            <td> <input class="form-control" type="number" name="student_id" id="student_id" placeholder="not yet assigned" value=""></td>
                                        @else
                                            <td> <input class="form-control" type="number" name="student_id" id="student_id" value="{{ $studentQuery->student_id }}"></td>
                                        @endif
                                        {{-- STUDENT ID STUFF END --}}
                                        <td>
                                            <a
                                            @if ($studentQuery->status == "dropped")
                                                class="badge badge-danger" disabled
                                            @elseif ($studentQuery->status == "registered")
                                                type="button" class="badge badge-success" disabled
                                            @else
                                                href="/students/update-status/{{ $studentQuery->registration_id }}" type="button" class=" btn-outline-primary btn-sm"
                                            @endif
                                            >{{$studentQuery->status}}</a>
                                        </td>
                                    </tr>
                                </table>
                                <h4 class="mt-4">Student Information</h4>
                                <table class="table table-sm table-md table-borderless" id="table-show-record">

                                    <tr>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Nationality</label></td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Phone Number</label></td>
                                        <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Email Address</label></td>
                                        <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Address</label></td>

                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality" value="{{$studentQuery->nationality}}">
                                            @error('nationality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        <td><input type="text" class="form-control @error('pnum') is-invalid @enderror" name="pnum" id="pnum" value="{{$studentQuery->pnum}}">
                                            @error('pnum')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        <td><input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$studentQuery->email}}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        <td><input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{$studentQuery->address}}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                    </tr>
                                </table>
                                @if ($studentQuery->nationality == "Filipino")

                                @else
                                    <h4 class="mt-4">Passport Information</h4>
                                    <table class="table table-sm table-md table-borderless" id="table-show-record">

                                        <tr>
                                            <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Passport Number</label></td>
                                            <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Date Issued</label></td>
                                            <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Date of Expiration</label></td>
                                            <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">ACR-ICARD Number</label></td>

                                        </tr>
                                        <tr>
                                            @if ($studentInfoQuery->count() == 0)
                                            <td><input type="text" class="form-control @error('passport_num') is-invalid @enderror" name="passport_num" id="passport_num" value="">
                                                @error('passport_num')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror</td>
                                            <td><input type="date" class="form-control @error('dpissued') is-invalid @enderror" name="dpissued" id="dpissued" value="">
                                                @error('dpissued')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror</td>
                                            <td><input type="date" class="form-control @error('dpexpiry') is-invalid @enderror" name="dpexpiry" id="dpexpiry" value="">
                                                @error('dpexpiry')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror</td>
                                            <td><input type="text" class="form-control @error('acr_icard_num') is-invalid @enderror" name="acr_icard_num" id="acr_icard_num" value="">
                                                @error('acr_icard_num')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror</td>
                                            @endif
                                            @foreach ($studentInfoQuery as $studentQuery)
                                                <td><input type="text" class="form-control @error('passport_num') is-invalid @enderror" name="passport_num" id="passport_num" value="{{$studentQuery->passport_num}}">
                                                    @error('passport_num')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror</td>
                                                <td><input type="date" class="form-control @error('dpissued') is-invalid @enderror" name="dpissued" id="dpissued" value="{{$studentQuery->dpissued}}">
                                                    @error('dpissued')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror</td>
                                                <td><input type="date" class="form-control @error('dpexpiry') is-invalid @enderror" name="dpexpiry" id="dpexpiry" value="{{$studentQuery->dpexpiry}}">
                                                    @error('dpexpiry')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror</td>
                                                <td><input type="text" class="form-control @error('acr_icard_num') is-invalid @enderror" name="acr_icard_num" id="acr_icard_num" value="{{$studentQuery->acr_icard_num}}">
                                                    @error('acr_icard_num')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror</td>
                                            @endforeach
                                        </tr>
                                    </table>
                                @endif
                                <h4 class="mt-4">Previous School Information</h4>
                                    @if ($studentQuery->nationality == "Filipino")
                                        @if ($studentInfoQueryFil->count() == 0)
                                            <div class="row">
                                                <div class="col">
                                                    <label for="last_school_name">Last School Attended (Full name)</label>
                                                    <input type="text" class="form-control @error('last_school_name') is-invalid @enderror" id="last_school_name" name="last_school_name" value="">
                                                    @error('last_school_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="year_graduated">Year Graduated</label>
                                                    <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="year_graduated" name="year_graduated" value="">
                                                    @error('year_graduated')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col">
                                                    <label for="prev_sch_bnlb">Building Number/Lot/Blk/Phase</label>
                                                    <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_school_bname">Building Name</label>
                                                    <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_str_name">Street Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name" value="">
                                                </div>
                                            </div>

                                            <div class="mt-5 row">
                                                <div class="col">
                                                    <label for="prev_sch_brngy_name">Barangay Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_brngy_name" name="prev_sch_brngy_name" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_city_town">Town or City Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_prov">Province</label>
                                                    <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_reg">Region</label>
                                                    <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_country">Country</label>
                                                    <input type="text" class="form-control @error('prev_sch_country') is-invalid @enderror" id="prev_sch_country" name="prev_sch_country" value="">
                                                    @error('prev_sch_country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_zip">Zip Code</label>
                                                    <input type="text" class="form-control @error('prev_sch_zip') is-invalid @enderror" id="prev_sch_zip" name="prev_sch_zip" value="">
                                                    @error('prev_sch_zip')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($studentInfoQueryFil as $studentQuery)
                                        <div class="row">
                                            <div class="col">
                                                <label for="last_school_name">Last School Attended</label>
                                                <input type="text" class="form-control @error('last_school_name') is-invalid @enderror" id="last_school_name" name="last_school_name" value="{{$studentQuery->last_school_name}}">
                                                @error('last_school_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="year_graduated">Year Graduated</label>
                                                <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="year_graduated" name="year_graduated" value="{{$studentQuery->year_graduated}}">
                                                @error('year_graduated')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <label for="prev_sch_bnlb">Building Number/Lot/Blk/Phase</label>
                                                <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb" value="{{$studentQuery->prev_sch_bnlb}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_school_bname">Building Name</label>
                                                <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname" value="{{$studentQuery->prev_school_bname}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_str_name">Street Name</label>
                                                <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name" value="{{$studentQuery->prev_sch_str_name}}">
                                            </div>
                                        </div>

                                        <div class="mt-5 row">
                                            <div class="col">
                                                <label for="prev_sch_brngy_name">Barangay Name</label>
                                                <input type="text" class="form-control" id="prev_sch_brngy_name" name="prev_sch_brngy_name" value="{{$studentQuery->prev_sch_brngy_name}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_city_town">Town or City Name</label>
                                                <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town" value="{{$studentQuery->prev_sch_city_town}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_prov">Province</label>
                                                <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov" value="{{$studentQuery->prev_sch_prov}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_reg">Region</label>
                                                <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg" value="{{$studentQuery->prev_sch_reg}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_country">Country</label>
                                                <input type="text" class="form-control @error('prev_sch_country') is-invalid @enderror" id="prev_sch_country" name="prev_sch_country" value="{{$studentQuery->prev_sch_country}}">
                                                @error('prev_sch_country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_zip">Zip Code</label>
                                                <input type="text" class="form-control @error('prev_sch_zip') is-invalid @enderror" id="prev_sch_zip" name="prev_sch_zip" value="{{$studentQuery->prev_sch_zip}}">
                                                @error('prev_sch_zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endforeach

                                    @else
                                    @if ($studentInfoQuery->count() == 0)
                                            <div class="row">
                                                <div class="col">
                                                    <label for="last_school_name">Last School Attended (Full name)</label>
                                                    <input type="text" class="form-control @error('last_school_name') is-invalid @enderror" id="last_school_name" name="last_school_name" value="">
                                                    @error('last_school_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="year_graduated">Year Graduated</label>
                                                    <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="year_graduated" name="year_graduated" value="">
                                                    @error('year_graduated')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col">
                                                    <label for="prev_sch_bnlb">Building Number/Lot/Blk/Phase</label>
                                                    <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_school_bname">Building Name</label>
                                                    <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_str_name">Street Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name" value="">
                                                </div>
                                            </div>

                                            <div class="mt-5 row">
                                                <div class="col">
                                                    <label for="prev_sch_brngy_name">Barangay Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_brngy_name" name="prev_sch_brngy_name" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_city_town">Town or City Name</label>
                                                    <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_prov">Province</label>
                                                    <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_reg">Region</label>
                                                    <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg" value="">
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_country">Country</label>
                                                    <input type="text" class="form-control @error('prev_sch_country') is-invalid @enderror" id="prev_sch_country" name="prev_sch_country" value="">
                                                    @error('prev_sch_country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="prev_sch_zip">Zip Code</label>
                                                    <input type="text" class="form-control @error('prev_sch_zip') is-invalid @enderror" id="prev_sch_zip" name="prev_sch_zip" value="">
                                                    @error('prev_sch_zip')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($studentInfoQuery as $studentQuery)
                                        <div class="d-flex flex-row justify-content">
                                            <div class="col">
                                                <label for="last_school_name">Last School Attended</label>
                                                <input type="text" class="form-control @error('last_school_name') is-invalid @enderror" id="last_school_name" name="last_school_name" value="{{$studentQuery->last_school_name}}">
                                                @error('last_school_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="year_graduated">Year Graduated</label>
                                                <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="year_graduated" name="year_graduated" value="{{$studentQuery->year_graduated}}">
                                                @error('year_graduated')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <label for="prev_sch_bnlb">Building Number/Lot/Blk/Phase</label>
                                                <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb" value="{{$studentQuery->prev_sch_bnlb}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_school_bname">Building Name</label>
                                                <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname" value="{{$studentQuery->prev_school_bname}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_str_name">Street Name</label>
                                                <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name" value="{{$studentQuery->prev_sch_str_name}}">
                                            </div>
                                        </div>

                                        <div class="mt-5 row">
                                            <div class="col">
                                                <label for="prev_sch_brngy_name">Barangay Name</label>
                                                <input type="text" class="form-control" id="prev_sch_brngy_name" name="prev_sch_brngy_name" value="{{$studentQuery->prev_sch_brngy_name}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_city_town">Town or City Name</label>
                                                <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town" value="{{$studentQuery->prev_sch_city_town}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_prov">Province</label>
                                                <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov" value="{{$studentQuery->prev_sch_prov}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_reg">Region</label>
                                                <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg" value="{{$studentQuery->prev_sch_reg}}">
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_country">Country</label>
                                                <input type="text" class="form-control @error('prev_sch_country') is-invalid @enderror" id="prev_sch_country" name="prev_sch_country" value="{{$studentQuery->prev_sch_country}}">
                                                @error('prev_sch_country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="prev_sch_zip">Zip Code</label>
                                                <input type="text" class="form-control @error('prev_sch_zip') is-invalid @enderror" id="prev_sch_zip" name="prev_sch_zip" value="{{$studentQuery->prev_sch_zip}}">
                                                @error('prev_sch_zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                {{-- END OF EDIT FORM --}}

                {{-- </div> --}}

                <hr class="bg-danger border-2 border-top mt-5">
                        <h2 class="">Student Registration Files</h2>
                            <div class="row">
                                @if ($uploadQuery->count() <= 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="accomp_dec_wform">Accomplished Declaration and Waiver Form</label>
                                                <input type="file" class="form-control-file" id="accomp_dec_wform" name="accomp_dec_wform[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Accomplished Declaration and Waiver Form</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($uploadQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="accomp_dec_wform">Waiver</label>
                                                <input type="file" class="form-control-file" id="accomp_dec_wform" name="accomp_dec_wform[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Accomplished Declaration and Waiver Form Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>




                                    @endif
                                @endforeach
                            </div>
                            {{-- BIRTH CERT --}}
                            <div class="row">
                                @if ($birthQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="birth_cirt">PSA Birth Certificate</label>
                                                <input type="file" class="form-control-file" id="birth_cirt" name="birth_cirt[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">PSA Birth Certificate Uploaded</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @foreach ($birthQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="font-weight-bold" for="birth_cirt">PSA Birth Certificate</label>
                                                    <input type="file" class="form-control-file" id="birth_cirt" name="birth_cirt[]" multiple>
                                                </div>
                                                <div class="col">
                                                    <h6 for="">PSA Birth Certificate Uploaded</h6>
                                                    <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            {{-- CONSENT CERT --}}
                            <div class="row">
                                @if ($consenthQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="accomp_consent_form">Accomplished Consent Form</label>
                                                <input type="file" class="form-control-file" id="accomp_consent_form" name="accomp_consent_form[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Accomplished Consent Form Uploaded</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($consenthQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="accomp_consent_form">Accomplished Consent Form</label>
                                                <input type="file" class="form-control-file" id="accomp_consent_form" name="accomp_consent_form[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Accomplished Consent Form Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>


                                    @endif
                                @endforeach
                            </div>

                            {{-- </div> --}}
                            {{-- <div class="d-flex justify-content-around col-12"> --}}
                            {{-- MORAL CERT --}}
                            <div class="row">
                                @if ($moralQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="good_moral_cert">Good Moral Character Certificate</label>
                                                <input type="file" class="form-control-file" id="good_moral_cert" name="good_moral_cert[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Good Moral Character Certificate Uploaded</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($moralQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="good_moral_cert">Good Moral Character Certificate</label>
                                                <input type="file" class="form-control-file" id="good_moral_cert" name="good_moral_cert[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Good Moral Character Certificate Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>


                                    @endif
                                @endforeach
                            </div>
                            {{-- GRADE CERT --}}
                            <div class="row">
                                @if ($gradeQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="grades">Report Card/Copy of Grades</label>
                                                <input type="file" class="form-control-file" id="grades" name="grades[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Report Card/Copy of Grades Uploaded</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($gradeQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="grades">Report Card/Copy of Grades</label>
                                                <input type="file" class="form-control-file" id="grades" name="grades[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Report Card/Copy of Grades Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>



                                    @endif
                                @endforeach
                            </div>
                            {{-- Receipt CERT --}}
                            <div class="row">
                                @if ($recieptQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="reciept">Receipt</label>
                                                <input type="file" class="form-control-file" id="reciept" name="reciept[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Receipt Uploaded</h6>
                                                <p>No file uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($recieptQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="reciept">Receipt</label>
                                                <input type="file" class="form-control-file" id="reciept" name="reciept[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Receipt Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>



                                    @endif
                                @endforeach
                            </div>
                            {{-- <div class="row">
                                @if ($otherQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="other_files">Other File/s</label>
                                                <input type="file" class="form-control-file" id="other_files" name="other_files[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Other Files Uploaded</h6>
                                                <p>No file/s uploaded.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($otherQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold" for="reciept">Other Files Uploaded</label>
                                                <input type="file" class="form-control-file" id="other_files" name="other_files[]" multiple>
                                            </div>
                                            <div class="col">
                                                <h6 for="">Other Files Uploaded</h6>
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <pre id="selected"></pre>
                            </div> --}}
                    </div>


                    <div class="card-footer" role="" aria-label="Basic outlined example">
                        {{-- <button type="submit" class="btn btn-outline-primary">Submit</button> --}}
                        <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Update Student</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /#page-content-wrapper -->
@include('students.edit_script')
<script>
    var AuthUser = "{{{ (Auth::user()->is_admin) ? Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2 : 3 }}}";
    if (AuthUser == 3) {
        $('#iframe').ready(function() {
            setTimeout(function() {
                $('#iframe').contents().find('#download').remove();
            }, 100);
        });

    }
</script>
@endsection
