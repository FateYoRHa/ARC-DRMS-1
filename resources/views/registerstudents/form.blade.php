@extends('layouts.registration')

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-secondary fade show" role="alert" id="error-alert">

            @foreach ($errors->all() as $error)
                <span class="material-icons-round material-icons">
                    error_outline
                </span> {{ $error }}
            @endforeach
        </div>
    @endif --}}
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
    {{--  id="new-registration-form" --}}
    <div id="img-holder">
        <form action="{{ route('register-student') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- {{ csrf_field() }} --}}
            <div class="container-fluid mx-auto mt-5" style="width: 70%">
                <div class="card text-center">
                    <div class="card-header">
                        <h1>Welcome to the University of Baguio, where your journey of a momentous and memorable college
                            life is
                            about to happen!</h2>
                    </div>
                    <div>
                        <p>The University of Baguio is now accepting new enrollees for First Semester of School Year
                            2022-2023.
                            Kindly fill out the information below completely. Any information gathered shall be used by the
                            university for recording purposes only, and will be kept with utmost confidentiality.
                        </p>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/COMPLETE_BANNERS_V2_2022.jpg') }}" class="card-img-top"
                            alt="COMPLETE_BANNERS_V2_2022">
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>PAYMENT OPTIONS</h3>
                    </div>
                    <div class="card-body">

                        <p style="white-space: pre-wrap;">
                            1. Payment through UB Cashier's Office (Monday to Friday, 8:00AM - 4:00 PM)

                            2. Union Bank Online Bills Payment (App or Browser)
                            Click the link for the step by step procedures:
                            <a
                                href="https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf">https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf</a>

                            3. Over the counter Bank Payment:

                            Metrobank Bills Payment.
                            Account Name: University of Baguio

                            BDO Savings Account Number: 001830055680

                            Landbank Savings Account Number: 0221287800

                            4. For more detailed payment procedures go to <a
                                href="https://mis.ubaguio.edu/payment-procedure/">https://mis.ubaguio.edu/payment-procedure/</a>
                        </p>
                    </div>
                </div>

                {{-- Entrance Status --}}
                {{-- <input type="text" id="registration_id" name="registration_id" value="" hidden>
                <input type="text" class="form-control" id="status" name="status" value="pending" hidden> --}}
                <div class="card mt-3 ">
                    <div class="card-header text-center">
                        <h3>Entrance Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="entrance_status"
                                    id="incoming_first_year" value="incoming_first_year" onclick="show(0)"
                                    @if (old('entrance_status') == 'incoming_first_year') {{-- THIS KEEPS RADIO BUTTONS CHECKED EVEN WHEN REFRESHED/VALIDATED --}}
                                        checked @endif>
                                <label class="form-check-label" for="incoming_first_year">
                                    Incoming First Year
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="entrance_status" id="transferee"
                                    value="transferee" onclick="show(1)"
                                    @if (old('entrance_status') == 'transferee') {{-- THIS KEEPS RADIO BUTTONS CHECKED EVEN WHEN REFRESHED/VALIDATED --}}
                                        checked @endif>
                                <label class="form-check-label" for="transferee">
                                    Transferee
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="entrance_status"
                                    id="returning_first_year" value="returning_first_year" onclick="show(2)"
                                    @if (old('entrance_status') == 'returning_first_year') {{-- THIS KEEPS RADIO BUTTONS CHECKED EVEN WHEN REFRESHED/VALIDATED --}}
                                        checked @endif>
                                <label class="form-check-label" for="returning_first_year">
                                    Incoming First Year - UB Senior High School Graduate and UB Undergraduate (Old Student
                                    with ID Number)
                                    {{-- GO TO SECTION 5 --}}
                                </label>
                            </div>
                            @error('entrance_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-4 old_id_num" id="old_id_num" style="display:none;">
                            <label for="old_id">Old ID number</label>
                            <input type='text' class='form-control @error('old_id') is-invalid @enderror' id='old_id'
                                name='old_id' value="{{ old('old_id') }}">
                            @error('old_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Old Student(SECTION 5) SHOWS WHEN 3rd option is ticked --}}


                {{-- INFORMATION --}}
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h3>Student Information</h3>
                    </div>
                    <div class="card-body">
                        <h4>Personal Info</h4>
                        <div class="form-group col-4">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname"
                                name="fname" placeholder="" value="{{ old('fname') }}">
                            {{-- {{ $errors }} --}}
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="mname">Middle Name</label>
                            <input type="text" class="form-control @error('mname') is-invalid @enderror" id="mname"
                                name="mname" placeholder="" value="{{ old('mname') }}">
                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname"
                                name="lname" placeholder="" value="{{ old('lname') }}">
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- DROPDOWN --}}
                        <h4 class=" mt-5">Program</h4>
                        {{-- <a class="btn btn-secondary dropdown-toggle" type="button" id="program" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a> --}}
                        <div class="col-4">
                            <select class="form-control @error('program') is-invalid @enderror" name="program"
                                aria-labelledby="program">
                                <option>Program</option>
                                @foreach ($courses as $course)
                                    {{-- <input type="text" hidden id="department" name="department" value=""> --}}

                                    <option value="{{ $course->course_acronym }}"
                                        {{ old('program') == $course->course_acronym ? 'selected' : '' }}>
                                        {{ $course->course_acronym }} -
                                        {{ $course->course }} </option>
                                @endforeach
                            </select>
                            @error('program')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <h4 class=" mt-5">Nationality</h4>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nationality" id="nationality1"
                                    value="Filipino" onclick="nat(0)"
                                    @if (old('nationality') == 'Filipino') {{-- THIS KEEPS RADIO BUTTONS CHECKED EVEN WHEN REFRESHED/VALIDATED --}}
                                    checked @endif>
                                <label class="form-check-label" for="filipino">
                                    Filipino
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="nationality" id="nationality2"
                                    value="other" onclick="nat(1)"
                                    @if (old('nationality') == 'other') {{-- THIS KEEPS RADIO BUTTONS CHECKED EVEN WHEN REFRESHED/VALIDATED --}}
                                    checked @endif>
                                <label class="form-check-label" for="other">
                                    Others
                                </label>
                                <input type="text" class="form-control ml-3 @error('other_text') is-invalid @enderror"
                                    id="other_text" name="other_text" style="display:none;"
                                    value="{{ old('other_text') }}">
                                @error('other_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @error('nationality')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- FOR INTERNATIONAL STUDENTS (SHOWN WHEN NATIONALITY IS TICKED AS OTHERS) --}}

                        <div id="foreigners" style="display:none;">
                            <h4 class="mt-5">FOR INTERNATIONAL STUDENTS</h4>
                            <p>In this section the following questions are for International Students ONLY. Please skip this
                                if
                                you are not an international student.</p>


                            <div class="col-6">
                                <label for="passport_num">Passport Number</label>
                                <input type="text" class="form-control @error('passport_num') is-invalid @enderror"
                                    id="passport_num" name="passport_num" value="{{ old('passport_num') }}">
                                @error('passport_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="dpissued">Date Issued of Passport</label>
                                <input type="text" name="dpissued" id="dpissued"
                                    class="date form-control @error('dpissued') is-invalid @enderror"
                                    value="{{ old('dpissued') }}">
                                @error('dpissued')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span> --}}
                            </div>
                            <div class="col-6">
                                <label for="dpexpiry">Date of Expiry of Passport</label>
                                <input type="text" name="dpexpiry" id="dpexpiry"
                                    class="date form-control @error('dpexpiry') is-invalid @enderror"
                                    value="{{ old('dpexpiry') }}">
                                @error('dpexpiry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span> --}}
                            </div>
                            {{-- <div class="col-6">
                                <label for="dpissued">Date Issued of Passport</label>
                                <section class="container">
                                    <form>
                                        <div class="row form-group">
                                            <div class="input-group date" id="dpissued">
                                                <input type="text" class="form-control">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <div class="col-6">
                                <label for="dpexpiry">Date of Expiry of Passport</label>
                                <section class="container">
                                    <form>
                                        <div class="row form-group">
                                            <div class="input-group date" id="dpexpiry">
                                                <input type="text" class="form-control">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div> --}}

                            <div class="col-6">
                                <label for="acr_icard_num">ACR-ICARD Number</label>
                                <input type="text" class="form-control @error('acr_icard_num') is-invalid @enderror"
                                    id="acr_icard_num" name="acr_icard_num" value="{{ old('acr_icard_num') }}">
                                @error('acr_icard_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="col-6">
                            <div id='passport_numLabel'></div>
                            <div id='passport_numIn'></div>
                        </div>
                        <div class="col-6">
                            <div id='dpissuedLabel'></div>
                            <div id='dpissuedIn'></div>
                        </div>
                        <div class="col-6">
                            <div id='dpexpiryLabel'></div>
                            <div id='dpexpiryIn'></div>
                        </div>
                        <div class="col-6">
                            <div id='acr_icard_numLabel'></div>
                            <div id='acr_icard_numIn'></div>
                        </div> --}}

                        {{-- END for INTERNATIONAL STUDENTS --}}

                        <h5 class="mt-3">Last School Attended</h5>

                        <div class="col-6">
                            <label for="last_school_name">Last School Attended (Full name)</label>
                            <input type="text" class="form-control @error('last_school_name') is-invalid @enderror"
                                id="last_school_name" name="last_school_name" value="{{ old('last_school_name') }}">
                            @error('last_school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="year_graduated">Year Graduated</label>
                            <input type="text" class="form-control @error('year_graduated') is-invalid @enderror"
                                id="year_graduated" name="year_graduated" value="{{ old('year_graduated') }}">
                            @error('year_graduated')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <h5 class="mt-3">Address of Last School Attended</h5>

                        <div class="col-6">
                            <label for="prev_sch_bnlb">Building number or Lot/Blk/Phase (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb"
                                value="{{ old('prev_sch_bnlb') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_school_bname">Building Name (Optional)</label>
                            <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname"
                                value="{{ old('prev_school_bname') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_str_name">Street Name (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name"
                                value="{{ old('prev_sch_str_name') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_brngy_name">Barangay Name (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_brngy_name"
                                name="prev_sch_brngy_name" value="{{ old('prev_sch_brngy_name') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_city_town">Town or City Name (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town"
                                value="{{ old('prev_sch_city_town') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_prov">Province (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov"
                                value="{{ old('prev_sch_prov') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_reg">Region (Optional)</label>
                            <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg"
                                value="{{ old('prev_sch_reg') }}">
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_country">Country</label>
                            <input type="text" class="form-control @error('prev_sch_country') is-invalid @enderror"
                                id="prev_sch_country" name="prev_sch_country" value="{{ old('prev_sch_country') }}">
                            @error('prev_sch_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_zip">Zip Code</label>
                            <input type="text" class="form-control @error('prev_sch_zip') is-invalid @enderror"
                                id="prev_sch_zip" name="prev_sch_zip" value="{{ old('prev_sch_zip') }}">
                            @error('prev_sch_zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <h4 class="mt-5">Contact Info</h4>
                        <div class="col-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" id="address" placeholder="house #/street/city/province"
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="email">E-mail Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="juan@email.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="pnum">Contact Number</label>
                            <input type="text" class="form-control @error('pnum') is-invalid @enderror"
                                id="pnum" name="pnum" placeholder="09123456789" value="{{ old('pnum') }}">
                            @error('pnum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="city_prov">City/Province</label>
                            <input type="text" class="form-control @error('city_prov') is-invalid @enderror"
                                id="city_prov" name="city_prov" value="{{ old('city_prov') }}">
                            @error('city_prov')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="brngy_town">Barangay/Town (Optional)</label>
                            <input type="text" class="form-control" id="brngy_town" name="brngy_town"
                                value="{{ old('brngy_town') }}">
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h4>Files</h4>
                    </div>

                    <div class="card-body">

                        <p class="card-header">Please attach the clear scanned copy of both the front and back part of
                            Grade 12 Report Card, Transfer Credential and copy of grades if your are a Transferee.</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="grades">Report Card/Copy of Grades</label>
                            <input type="file" class="form-control-file" id="grades" name="grades[]" multiple>
                        </div>
                        @if ($errors->has('grades'))
                            <div class="alert alert-danger">{{ $errors->first('grades') }}</div>
                        @endif
                        <p class="card-header mt-3">Please attach the accomplished Declaration and Waiver Form</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="accomp_dec_wform">Accomplished Declaration and Waiver
                                Form</label>
                            <input type="file" class="form-control-file" id="accomp_dec_wform"
                                name="accomp_dec_wform[]">
                        </div>
                        @if ($errors->has('accomp_dec_wform'))
                            <div class="alert alert-danger">{{ $errors->first('accomp_dec_wform') }}</div>
                        @endif
                        <p class="card-header mt-3">Please attach the Accomplished Consent Form</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="accomp_consent_form">Accomplished Consent Form</label>
                            <input type="file" class="form-control-file" id="accomp_consent_form"
                                name="accomp_consent_form[]">
                        </div>
                        @if ($errors->has('accomp_consent_form'))
                            <div class="alert alert-danger">{{ $errors->first('accomp_consent_form') }}</div>
                        @endif
                        <p class="card-header mt-3">Please attach the scanned copy of Good Moral Character Certificate
                            here: (PDF and Image Type)</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="good_moral_cert">Good Moral Character Certificate</label>
                            <input type="file" class="form-control-file" id="good_moral_cert"
                                name="good_moral_cert[]">
                        </div>
                        @if ($errors->has('good_moral_cert'))
                            <div class="alert alert-danger">{{ $errors->first('good_moral_cert') }}</div>
                        @endif
                        <p class="card-header mt-3">Please attach the scanned copy of PSA Birth Certificate here: (PDF and
                            Image Type)</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="birth_cirt">PSA Birth Certificate</label>
                            <input type="file" class="form-control-file" id="birth_cirt" name="birth_cirt[]">
                        </div>
                        @if ($errors->has('birth_cirt'))
                            <div class="alert alert-danger">{{ $errors->first('birth_cirt') }}</div>
                        @endif
                        <p class="card-header mt-3">Please attach the scanned copy of your Admission Processing Fee of Php
                            1, 000.00 with your printed name (FOR THOSE WHO PAID THROUGH GCASH, PLEASE ATTACH A SCREENSHOT
                            OF THE CONFIRMATION TEXT OR EMAIL YOU RECEIVED UPON MAKING THE PAYMENT AS YOUR PROOF OF
                            PAYMENT). Note: This fee is non-refundable but it will be credited to your tuition fee once
                            officially enrolled.</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="reciept">Payment Reciept</label>
                            <input type="file" class="form-control-file" id="reciept" name="reciept[]">
                        </div>
                        @if ($errors->has('reciept'))
                            <div class="alert alert-danger">{{ $errors->first('reciept') }}</div>
                        @endif
                    </div>

                    <div class="card-footer">
                        <div class="text-center" role="" aria-label="Basic outlined example">
                            <button type="submit" class="btn btn-success">Submit</button>
                            {{-- <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record"
                                onClick="ValidateForm(this.form)">Submit</button> --}}
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function show(x) {
            console.log(x);
            if (x == 2) {
                document.getElementById("old_id_num").style.display = "block";
            } else {
                document.getElementById("old_id_num").style.display = "none";
            }
        }

        function nat(x) {
            console.log(x);
            if (x == 1) {
                document.getElementById("other_text").style.display = "block";
                document.getElementById("foreigners").style.display = "inline-block";
            } else {
                document.getElementById("other_text").style.display = "none";
                document.getElementById("foreigners").style.display = "none";
            }
        }
        $(function() {
            $('#dpissued').datepicker(); //DATE PASSPORT ISSUED
            $('#dpexpiry').datepicker(); //DATE PASSPORT EXPIRY
        })
    </script>
    {{-- @include('registerstudents.index_script') --}}
@endsection
