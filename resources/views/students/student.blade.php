@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>Student Registration Information</h2>
        </div>
        <hr />

        <div class="position-fixed" style="z-index:1;">
            <a href="{{ route('students.index') }}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg></a>
        </div>

        @if ($errors->any())
        <div class="alert alert-secondary fade show" role="alert" id="error-alert">

            @foreach ($errors->all() as $error)
            <span class="material-icons-round material-icons">
                error_outline
            </span> {{ $error }}
            @endforeach

        </div>
        @endif

        <div class="primary-details row col-12 mt-5">
            {{-- <div class="col-md-2 profile-img">
                <img src="{{ asset('images/blank-profile.png') }}" alt="" class="profile-img">
                </div> --}}
                <div class="col">



                    <div class="card d-flex justify-content">

                        <div class="card-header">
                            <div class="float-right edit-record-btn">
                                @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                <a href="\students\{{$studentQuery->registration_id}}\edit" class="edit-record btn btn-success py-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg> Edit</a>
                                    {{-- <a href="{{ route('update-status'), $studentQuery->registration_id }}" type="button" class=" btn-outline-success btn-sm">Update Status</a> --}}

                                @else

                                @endif
                            </div>
                            <h3>{{$studentQuery->lname}}, {{$studentQuery->fname}} {{$studentQuery->mname}}</h3>
                            <h5>{{ $studentQuery->department }}-{{ $studentQuery->course }}</h5>
                        </div>
                        <div class="card-body">
                            <h4 class="mt-4">Entrance Information</h4>
                            <table class="table table-sm table-md table-borderless" id="table-show-record">

                                <tr>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Registration Number</label> </td>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Entrance Status</label> </td>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Student ID</label> </td>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Current Status</label>  </td>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold"></label>  </td>
                                </tr>
                                <tr>
                                    <td><p>{{$studentQuery->registration_id}}</p></td>
                                    <td>
                                        <p>
                                            @if ($studentQuery->entrance_status == "returning_first_year")
                                                Incoming First Year(Old Student)
                                            @elseif ($studentQuery->entrance_status == "incoming_first_year")
                                                Incoming First Year
                                            @else
                                                Transferee

                                            @endif
                                        </p>
                                    </td>
                                    @if ($studentQuery->student_id == "")
                                        <td> <p>not yet assigned</p> </td>
                                    @else
                                        <td> <p>{{ $studentQuery->student_id }}</p> </td>
                                    @endif
                                    <td>
                                        <span
                                            @if ($studentQuery->status == "dropped")
                                                class="badge badge-danger"
                                            @elseif ($studentQuery->status == "registered")
                                                class="badge badge-success"
                                            @elseif ($studentQuery->status == "for id")
                                                class="badge badge-secondary"
                                            @elseif ($studentQuery->status == "pending")
                                                class="badge badge-warning"
                                            @elseif ($studentQuery->status == "for approval")
                                                class="badge badge-primary"
                                            @else
                                                class="badge badge-info"
                                            @endif
                                            >{{ $studentQuery->status }}</span>
                                    </td>
                                    <td>
                                        <div class="row">
                                            @if ($studentQuery->status == "for encoding/enrollment")
                                                <a href="/students/update-status/{{ $studentQuery->registration_id }}">
                                                    Enroll/Encode
                                                </a>
                                            @elseif ($studentQuery->status == "for id")
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIdModal">
                                                    Add ID
                                                  </button>

                                            @elseif ($studentQuery->status == "pending")
                                                <a href="/students/update-status/{{ $studentQuery->registration_id }}">
                                                    Accept
                                                </a>

                                            @elseif ($studentQuery->status == "for approval")
                                                <a href="/students/update-status/{{ $studentQuery->registration_id }}">
                                                    Approve
                                                </a>
                                            @endif

                                                @if ($studentQuery->status == "dropped")

                                                @elseif ($studentQuery->status == "registered")

                                                @else
                                                    <a
                                                        href="/students/update-status-drop/{{ $studentQuery->registration_id }}" type="button" class=" btn-outline-danger btn-sm"
                                                    >Drop
                                                    </a>
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <hr class="bg-danger border-2 border-top mt-5">
                            <h4 class="mt-4">Student Information</h4>
                            <table class="table table-sm table-md table-borderless" id="table-show-record">

                                <tr>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Nationality</label></td>
                                    <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Phone Number</label></td>
                                    <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Email Address</label></td>
                                    <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Address</label></td>

                                </tr>
                                <tr>
                                    <td><p>{{$studentQuery->nationality}}</p></td>
                                    <td><p>{{$studentQuery->pnum}}</p></td>
                                    <td><p>{{$studentQuery->email}}</p></td>
                                    <td><p>{{$studentQuery->address}}</p></td>
                                </tr>
                            </table>
                            @if ($studentQuery->nationality == "Filipino")

                            @else
                            <hr class="bg-danger border-2 border-top mt-5">
                                <h4 class="mt-4">Passport Information</h4>
                                <table class="table table-sm table-md table-borderless" id="table-show-record">

                                    <tr>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Passport Number</label></td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Date Issued</label></td>
                                        <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">Date of Expiration</label></td>
                                        <td><label for="" class="col-form-label-md primary-details-content font-weight-bold">ACR-ICARD Number</label></td>

                                    </tr>
                                    <tr>
                                        @foreach ($studentInfoQuery as $studentQuery)
                                            <td><p>{{$studentQuery->passport_num}}</p></td>
                                            <td><p>{{$studentQuery->dpissued}}</p></td>
                                            <td><p>{{$studentQuery->dpexpiry}}</p></td>
                                            <td><p>{{$studentQuery->acr_icard_num}}</p></td>
                                        @endforeach
                                    </tr>
                                </table>
                            @endif
                            <hr class="bg-danger border-2 border-top mt-5">
                            <h4 class="mt-4">Previous School Information</h4>
                                <table class="table table-sm table-md table-borderless" id="table-show-record">

                                    <tr>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Last School Attented</label></td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Year Graduated</label></td>
                                        <td> <label for="" class="col-form-label-md primary-details-content font-weight-bold">Address</label></td>


                                    </tr>
                                    <tr>
                                        @if ($studentQuery->nationality == "Filipino")
                                            @foreach ($studentInfoQueryFil as $studentQuery)
                                                <td><p>{{$studentQuery->last_school_name}}</p></td>
                                                <td><p>{{$studentQuery->year_graduated}}</p></td>
                                                <td><p>
                                                    @if ($studentQuery->prev_sch_bnlb == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_bnlb}},
                                                    @endif

                                                    @if ($studentQuery->prev_school_bname == "")

                                                    @else
                                                        {{$studentQuery->prev_school_bname}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_str_name == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_str_name}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_city_town == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_city_town}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_brngy_name == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_brngy_name}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_zip == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_zip}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_prov == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_prov}}
                                                    @endif

                                                    @if ($studentQuery->prev_sch_reg == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_reg}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_country == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_country}}
                                                    @endif
                                                </p></td>
                                            @endforeach
                                        @else
                                            @foreach ($studentInfoQuery as $studentQuery)
                                                <td><p>{{$studentQuery->last_school_name}}</p></td>
                                                <td><p>{{$studentQuery->year_graduated}}</p></td>
                                                <td><p>
                                                    @if ($studentQuery->prev_sch_bnlb == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_bnlb}},
                                                    @endif

                                                    @if ($studentQuery->prev_school_bname == "")

                                                    @else
                                                        {{$studentQuery->prev_school_bname}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_str_name == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_str_name}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_city_town == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_city_town}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_brngy_name == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_brngy_name}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_zip == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_zip}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_prov == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_prov}}
                                                    @endif

                                                    @if ($studentQuery->prev_sch_reg == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_reg}},
                                                    @endif

                                                    @if ($studentQuery->prev_sch_country == "")

                                                    @else
                                                        {{$studentQuery->prev_sch_country}}
                                                    @endif
                                                </p></td>
                                            @endforeach

                                        @endif

                                    </tr>
                                </table>
                    <hr class="bg-danger border-2 border-top mt-5">
                    <h2>Student Registration Files</h2>
                    <div class="row">
                        <div class="col">
                            <h6 for="">Accomplished Declaration and Waiver Form</h6>
                                @if ($uploadQuery->count() <= 0)
                                    <div class="row">
                                        <div class="col-6">
                                            <p>No file uploaded.</p>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($uploadQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">Submitted/Recieved At</label>
                                            <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                        </div>
                        <div class="col">
                            {{-- BIRTH CERT --}}
                            <h6 for="">PSA Birth Certificate</h6>
                                @if ($birthQuery->count() == 0)

                                <div class="row">
                                    <div class="col-6">
                                        <p>No file uploaded.</p>
                                    </div>
                                </div>
                                @endif
                                @foreach ($birthQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">Submitted/Recieved At</label>
                                            <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                    {{-- CONSENT CERT --}}
                    <hr class="bg-danger border-2 border-top">
                    <div class="row">
                        <div class="col">

                            <h6 for="">Accomplished Consent Form</h6>
                                @if ($consenthQuery->count() == 0)
                                    <div class="col-6">
                                        <div class="row">
                                            <p>No file uploaded.</p>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($consenthQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">Submitted/Recieved At</label>
                                            <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                        </div>
                        <div class="col">
                            {{-- MORAL CERT --}}
                            <h6 for="">Good Moral Character Certificate</h6>
                                @if ($moralQuery->count() == 0)
                                <div class="row">
                                    <div class="col-6">
                                        <p>No file uploaded.</p>
                                    </div>
                                </div>
                                @endif
                                @foreach ($moralQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">Submitted/Recieved At</label>
                                            <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>


                    {{-- GRADE CERT --}}
                    <hr class="bg-danger border-2 border-top">
                    <div class="row">
                        <div class="col">
                            <h6 for="">Report Card/Copy of Grades</h6>

                            @if ($gradeQuery->count() == 0)
                                <div class="row">
                                    <div class="col-6">
                                        <p>No file uploaded.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('request-grades',$studentQuery->registration_id) }}" class="btn btn-info btn-sm">
                                            Make Request
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @foreach ($gradeQuery as $file)
                                <div class="row">
                                    @if($studentQuery->registration_id == $file->upload_id)
                                        {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                            <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                        </div> --}}
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    @endif
                                </div>
                                    <div class="mt-2 row">

                                        @if ($file->requested_on == null)

                                        @else
                                            <div class="col-6">
                                                <label for="">Requested On</label>
                                                <p>{{ date('M-d-Y h:i A', strtotime($file->requested_on)) }}</p>
                                            </div>
                                            @if ($file->recieved_at == null)
                                                <div class="col-6">
                                                    <a href="{{ route('recieved-grades',$studentQuery->registration_id) }}" class="btn btn-info btn-sm">Recieved</a>
                                                </div>
                                            @endif
                                        @endif
                                        @if ($file->recieved_at == null)

                                        @else
                                            <div class="col-6">
                                                <label for="">Recieved At</label>
                                                <p>{{ date('M-d-Y h:i A', strtotime($file->recieved_at)) }}</p>
                                            </div>
                                        @endif
                                    </div>
                            @endforeach
                        </div>
                                            {{-- Receipt CERT --}}
                        <div class="col">
                            <h6 for="">Receipt</h6>

                                @if ($recieptQuery->count() == 0)
                                <div class="row">
                                    <div class="col-6">
                                        <p>No file uploaded.</p>
                                    </div>
                                </div>
                                @endif
                                @foreach ($recieptQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">Submitted/Recieved At</label>
                                            <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="row">
                        <div class="col">
                            <h6 for="">Other Files</h6>

                                @if ($otherQuery->count() == 0)
                                <div class="row">
                                    <div class="col-6">
                                        <p>No file uploaded.</p>
                                    </div>
                                </div>
                                @endif
                                @foreach ($otherQuery as $file)
                                    @if($studentQuery->registration_id == $file->upload_id)
                                    {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                                        <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                    </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="/uploads/{{$file->filename}}#viewer.action=download" target="_blank">{{$file->filename}}</a>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <label for="">Submitted/Recieved At</label>
                                                <p>{{ date('M-d-Y h:i A', strtotime($file->created_at)) }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                    </div> --}}

                    <hr class="bg-danger border-2 border-top">

                </div>
            </div>
        </div>
    </div>
</div>
@include('students.add_id_modal')
<!-- /#page-content-wrapper -->

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
