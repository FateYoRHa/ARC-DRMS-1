@extends('layouts.registration')

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
        {{--  id="new-registration-form" --}}
    <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container-fluid mx-auto mt-5" style="width: 70%">

                <input type="text" id="registration_id" name="registration_id" value="" hidden>
                <input type="text" class="form-control" id="status" name="status" value="pending" hidden>
                <div class="card">
                    <div class="card-header">
                        <h1>Welcome to the University of Baguio, where your journey of a momentous and memorable college life is
                            about to happen!</h2>
                    </div>
                    <div>
                        <p>The University of Baguio is now accepting new enrollees for First Semester of School Year 2022-2023.
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
                                    <a href="https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf">https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf</a>

                            3. Over the counter Bank Payment:

                                Metrobank Bills Payment.
                                Account Name: University of Baguio

                                    BDO Savings Account Number: 001830055680

                                    Landbank Savings Account Number: 0221287800

                            4. For more detailed payment procedures go to <a href="https://mis.ubaguio.edu/payment-procedure/">https://mis.ubaguio.edu/payment-procedure/</a>
                        </p>
                    </div>
                </div>
                <!-- {{-- CONSENT FORM --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>CONSENT FORM</h3>
                    </div>
                    <div class="card-body">
                        <p>I have read and understood the University of Baguio Privacy Policy which is posted at <a href="www.ubaguio.edu">www.ubaguio.edu</a>. I understand that the personal data being collected by the university will be devoted only for the identified primary and secondary purposes. I also understand that my personal data will be handled strictly by the authorized personnel of the university in accordance with the University of Baguio Privacy Manual. I am hereby giving my consent for the processing of my personal data including those of my parents / guardian stated in my student directory by the authorized personnel of the university for the identified primary and secondary purposes. The processing of my personal data may include any, several or all of the following: (1) collection, (2) use, (3) retention, (4) storage, (5) disposal, (6) disclosure, (7) sharing, and (8) other similar acts. This is without prejudice to my right to withdraw my consent at a later date or to object to the further processing of my personal data in accordance with the Data Privacy Act and its Implementing Rules and Regulations, the University of Baguio Privacy Policy, and the University of Baguio Privacy Manual. I am hereby giving my consent this date in the University of Baguio, Baguio City, Philippines.
                        </p>
                        <div class="form">
                            <div class="row">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="consent"
                                        id="consent_yes" value="Yes">
                                    <label class="form-check-label" for="consent_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="consent"
                                        id="consent_no" value="No">
                                    <label class="form-check-label" for="consent_no">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                {{-- Entrance Status --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Entrance Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="entrance_status"
                                id="entrance_status" value="incoming_first_year" {{ old('entrance_status') == 'incoming_first_year' ? 'checked' : '' }}>
                            <label class="form-check-label" for="incoming_first_year">
                                Incoming First Year
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="entrance_status"
                                id="entrance_status1" value="transferee" onclick="ShowHideIdField()" {{ old('entrance_status') == 'transferee' ? 'checked' : '' }}>
                            <label class="form-check-label" for="transferee">
                                Transferee
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="entrance_status"
                                id="entrance_status2" value="incoming_first_year_old" onclick="ShowHideIdField()" {{ old('entrance_status') == 'incoming_first_year_old' ? 'checked' : '' }}>
                            <label class="form-check-label" for="   ">
                                Incoming First Year - UB Senior High School Graduate and UB Undergraduate (Old Student with ID Number)
                                {{-- GO TO SECTION 5 --}}
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Old Student(SECTION 5) SHOWS WHEN 3rd option is ticked--}}
                <!-- <div class="incoming_first_year_old box"> -->
                    <div class="card mt-3">
                        <!-- <div class="card-header">
                            <h3>Old Student</h3>
                        </div> -->
                        <div class="card-body">
                            <div id="old_idLabel"></div>
                            <div class="form-group col-4">
                                <div id="old_idIn"></div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <div class="transferee box"></div> -->


                {{-- INFORMATION --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Student  Information</h3>
                    </div>
                    <div class="card-body">
                        <h4>Personal Info</h4>
                        <div class="form-group col-4">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Juan" value="Juan" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="mname">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="de Dragon" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Warrior" required>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-2">
                                <label for="">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="69">
                            </div>
                            <div class="form-group col-2">
                                <label for="">Sex</label>
                                <div class="row">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="male">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" value="female">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 container">
                                <label for="date">Birth Date</label>
                                <section class="container">
                                    <form>
                                        <div class="row form-group">
                                            <div class="input-group date" id="datepicker">
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
                            <div class="col-4">
                                <label for="pob">Place of Birth</label>
                                <input type="text" class="form-control" id="pob" placeholder="saan ka pinanganak">
                            </div>
                            <div class="col-2">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="address" placeholder="Filipino">
                            </div>

                        </div> --}}
                        {{-- DROPDOWN --}}
                        <h4 class=" mt-5">Program</h4>
                            {{-- <a class="btn btn-secondary dropdown-toggle" type="button" id="program" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a> --}}
                            <div class="col-4">
                                <select class="form-control" name="program" id="program" aria-labelledby="program" value="">
                                    <option selected="selected">BSCS</option>
                                    <option>BSIT</option>
                                    <option>BSBS</option>
                                    <option>BSSB</option>
                                </select>
                            </div>

                        <h4 class=" mt-5">Nationality</h4>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nationality"
                                        id="nationality1" value="Filipino" onclick="ShowHideNatField()">
                                    <label class="form-check-label" for="Filipino">
                                        Filipino
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="nationality"
                                        id="nationality2" value="other" onclick="ShowHideNatField()">
                                    <label class="form-check-label" for="other">
                                        Other
                                    </label>
                                    <input type="text" class="form-control ml-3" id="other_text" name="other_text">
                                </div>
                            </div>
                        {{-- FOR INTERNATIONAL STUDENTS (SHOWN WHEN NATIONALITY IS TICKED AS OTHERS) --}}

                        <h4 class="mt-5">FOR INTERNATIONAL STUDENTS</h4>
                        <p>In this section the following questions are for International Students ONLY. Please skip this if you are not an international student.</p>


                        <!-- <div class="col-6">
                            <label for="passport_num">Passport Number</label>
                            <input type="text" class="form-control" id="passport_num" name="passport_num">
                        </div>
                        <div class="col-6">
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
                        </div>

                        <div class="col-6">
                            <label for="acr_icard_num">ACR-ICARD Number</label>
                            <input type="text" class="form-control" id="acr_icard_num" name="acr_icard_num">
                        </div> -->

                        <div class="col-6">
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
                        </div>

                        {{-- END for INTERNATIONAL STUDENTS --}}

                        <h5 class="mt-3">Last School Attended</h5>

                        <div class="col-6">
                            <label for="last_school_name">Last School Attended (Full name)</label>
                            <input type="text" class="form-control" id="last_school_name" name="last_school_name" required>
                        </div>
                        <div class="col-6">
                            <label for="year_graduated">Year Graduated</label>
                            <input type="text" class="form-control" id="year_graduated" name="year_graduated" required>
                        </div>
                        <h5 class="mt-3">Address of Last School Attended</h5>

                        <div class="col-6">
                            <label for="prev_sch_bnlb">Building number or Lot/Blk/Phase</label>
                            <input type="text" class="form-control" id="prev_sch_bnlb" name="prev_sch_bnlb" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_school_bname">Building Name</label>
                            <input type="text" class="form-control" id="prev_school_bname" name="prev_school_bname" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_str_name">Street Name</label>
                            <input type="text" class="form-control" id="prev_sch_str_name" name="prev_sch_str_name" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_brngy_name">Barangay Name</label>
                            <input type="text" class="form-control" id="prev_sch_brngy_name" name="prev_sch_brngy_name" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_city_town">Town or City Name</label>
                            <input type="text" class="form-control" id="prev_sch_city_town" name="prev_sch_city_town" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_prov">Province</label>
                            <input type="text" class="form-control" id="prev_sch_prov" name="prev_sch_prov" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_reg">Region</label>
                            <input type="text" class="form-control" id="prev_sch_reg" name="prev_sch_reg" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_country">Country</label>
                            <input type="text" class="form-control" id="prev_sch_country" name="prev_sch_country" required>
                        </div>
                        <div class="col-6">
                            <label for="prev_sch_zip">Zip Code</label>
                            <input type="text" class="form-control" id="prev_sch_zip" name="prev_sch_zip" required>
                        </div>

                        <h4 class="mt-5">Contact Info</h4>
                        <div class="col-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address"
                                placeholder="house #/street/city/province" required>
                        </div>
                        <div class="col-6">
                            <label for="email">E-mail Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="juan@email.com" required>
                        </div>
                        <div class="col-6">
                            <label for="pnum">Contact Number</label>
                            <input type="number" class="form-control" id="pnum" name="pnum" placeholder="09123456789" required>
                        </div>
                        <div class="col-6">
                            <label for="city_prov">City/Province</label>
                            <input type="text" class="form-control" id="city_prov" name="city_prov" required>
                        </div>
                        <div class="col-6">
                            <label for="brngy_town">Barangay/Town</label>
                            <input type="text" class="form-control" id="brngy_town" name="brngy_town"  required>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Files</h4>
                    </div>

                    <div class="card-body">

                        <p class="card-header">Please attach the clear scanned copy of both the front and back part of Grade 12 Report Card, Transfer Credential and copy of grades if your are a Transferee.</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="grades">Report Card/Copy of Grades</label>
                            <input type="file" class="form-control-file" id="grades" name="grades[]" multiple required>
                        </div>
                        <p class="card-header mt-3">Please attach the accomplished Declaration and Waiver Form</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="accomp_dec_wform">Accomplished Declaration and Waiver Form</label>
                            <input type="file" class="form-control-file" id="accomp_dec_wform" name="accomp_dec_wform[]" multiple required>
                        </div>
                        <p class="card-header mt-3">Please attach the Accomplished Consent Form</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="accomp_consent_form">Accomplished Consent Form</label>
                            <input type="file" class="form-control-file" id="accomp_consent_form" name="accomp_consent_form[]" multiple required>
                        </div>
                        <p class="card-header mt-3">Please attach the scanned copy of Good Moral Character Certificate here: (PDF and Image Type)</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="good_moral_cert">Good Moral Character Certificate</label>
                            <input type="file" class="form-control-file" id="good_moral_cert" name="good_moral_cert[]" multiple required>
                        </div>
                        <p class="card-header mt-3">Please attach the scanned copy of PSA Birth Certificate here: (PDF and Image Type)</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="birth_cirt">PSA Birth Certificate</label>
                            <input type="file" class="form-control-file" id="birth_cirt" name="birth_cirt[]" multiple required>
                        </div>
                        <p class="card-header mt-3">Please attach the scanned copy of your Admission Processing Fee of Php 1, 000.00 with your printed name (FOR THOSE WHO PAID THROUGH GCASH, PLEASE ATTACH A SCREENSHOT OF THE CONFIRMATION TEXT OR EMAIL YOU RECEIVED UPON MAKING THE PAYMENT AS YOUR PROOF OF PAYMENT). Note: This fee is non-refundable but it will be credited to your tuition fee once officially enrolled.</p>
                        <div class="card-body col-6">
                            <label class="font-weight-bold" for="reciept">Reciept</label>
                            <input type="file" class="form-control-file" id="reciept" name="reciept[]" multiple required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <pre id="selected"></pre>
                        <div class="" role="" aria-label="Basic outlined example">
                            {{-- <button type="submit" class="btn btn-outline-primary">Submit</button> --}}
                            <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Submit</button>
                        </div>
                    </div>
                </div>


        </div>
    </form>
        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })

            function ShowHideIdField() {

                // if old student is selected
                if(document.getElementById('entrance_status2').checked) {
                    // && document.getElementById('entrance_status').value == 'incoming_first_year_old'
                    console.log('old student');

                    document.getElementById("old_idLabel").innerHTML =
                    "<label for='old_id'>Please Type your UB ID Number:</label>";

                    document.getElementById("old_idIn").innerHTML =
                    "<input type='text' class='form-control' name='old_id' id='old_id' placeholder='2020*****'required>";
                }

                //if transferee is selected
                if(document.getElementById('entrance_status1').checked) {

                    console.log('transferee');
                    document.getElementById("old_idLabel").innerHTML =
                    null;

                    document.getElementById("old_idIn").innerHTML =
                    null;
                }
            }

            function ShowHideNatField() {

                // if Filipino is selected
                if(document.getElementById('nationality1').checked) {

                    console.log('Filipino');
                    document.getElementById("passport_numLabel").innerHTML =
                    null;

                    document.getElementById("passport_numIn").innerHTML =
                    null;

                    document.getElementById("dpissuedLabel").innerHTML =
                    null;

                    document.getElementById("dpissuedIn").innerHTML =
                    null;

                    document.getElementById("dpexpiryLabel").innerHTML =
                    null;

                    document.getElementById("dpexpiryIn").innerHTML =
                    null;

                    document.getElementById("acr_icard_numLabel").innerHTML =
                    null;

                    document.getElementById("acr_icard_numIn").innerHTML =
                    null;


                }

                //if Other is selected
                if(document.getElementById('nationality2').checked) {

                    console.log('Other');
                    document.getElementById("passport_numLabel").innerHTML =
                    "<label for='passport_num'>Passport Number</label>";

                    document.getElementById("passport_numIn").innerHTML =
                    "<input type='text' class='form-control' id='passport_num' name='passport_num'>";

                    document.getElementById("dpissuedLabel").innerHTML =
                    "<label for='dpissued'>Date Issued of Passport</label>";

                    document.getElementById("dpissuedIn").innerHTML =
                    "<section class='container'>"
                        "<form>"
                            "<div class='row form-group'>"
                                "<div class='input-group date' id='dpissued'>"
                                    "<input type='text' class='form-control'>"
                                    "<span class='input-group-append'>"
                                        "<span class='input-group-text bg-white d-block'>"
                                            "<i class='fa fa-calendar'></i>"
                                        "</span>"
                                    "</span>"
                                "</div>"
                            "</div>"
                        "</form>"
                    "</section>";

                    document.getElementById("dpexpiryLabel").innerHTML =
                    "<label for='dpexpiry'>Date of Expiry of Passport</label>";

                    document.getElementById("dpexpiryIn").innerHTML =
                    "<section class='container'>"
                        "<form>"
                            "<div class='row form-group'>"
                                "<div class='input-group date' id='dpexpiry'>"
                                    "<input type='text' class='form-control'>"
                                        "<span class='input-group-append'>"
                                            "<span class='input-group-text bg-white d-block'>"
                                                "<i class='fa fa-calendar'></i>"
                                            "</span>"
                                        "</span>"
                                "</div>"
                            "</div>"
                        "</form>"
                    "</section>";

                    document.getElementById("acr_icard_numLabel").innerHTML =
                    "<label for='acr_icard_num'>ACR-ICARD Number</label>";

                    document.getElementById("acr_icard_numIn").innerHTML =
                    "<input type='text' class='form-control' id='acr_icard_num' name='acr_icard_num'>";

                }

                // $(function() {
                //     $('#dpissued').datepicker();//DATE PASSPORT ISSUED
                //     $('#dpexpiry').datepicker();//DATE PASSPORT EXPIRY
                // })

            }


            $(function() {
                $('#dpissued').datepicker();//DATE PASSPORT ISSUED
                $('#dpexpiry').datepicker();//DATE PASSPORT EXPIRY
            })
        </script> --}}
@include('registerstudents.index_script')
@endsection
