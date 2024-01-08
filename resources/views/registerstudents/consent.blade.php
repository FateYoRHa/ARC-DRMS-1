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
    <form>
        {{ csrf_field() }}
        <div class="container-fluid mx-auto mt-5" style="width: 70%">
        <!-- <div class="container-fluid mx-auto mt-5" style="background-image: url('{{ asset('images/ubmono.jpg')}}');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;"> -->



                <input type="text" id="registration_id" name="registration_id" value="" hidden>
                <div class="card text-center">
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
                    <div class="card-header text-center">
                        <h3>PAYMENT OPTIONS</h3>
                    </div>
                    <div class="card-body">

                        <p class>
                            1. Payment through UB Cashier's Office (Monday to Friday, 8:00AM - 4:00 PM)<br>

                            2. Union Bank Online Bills Payment (App or Browser)<br>
                                Click the link for the step by step procedures:<br>
                                <a href="https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf">https://ubaguio.edu/wp-content/uploads/2022/03/unionBankOPcode.pdf</a><br>

                            3. Over the counter Bank Payment:<br>

                                Metrobank Bills Payment.<br>
                                Account Name: University of Baguio<br>

                                    BDO Savings Account Number: 001830055680<br>

                                    Landbank Savings Account Number: 0221287800<br>

                            4. For more detailed payment procedures go to <a href="https://mis.ubaguio.edu/payment-procedure/">https://mis.ubaguio.edu/payment-procedure/</a>
                        </p>
                    </div>
                </div>
                {{-- CONSENT FORM --}}
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h3>CONSENT FORM</h3>
                    </div>
                    <div class="card-body text-center">
                        <p>I have read and understood the University of Baguio Privacy Policy which is posted at <a href="www.ubaguio.edu">www.ubaguio.edu</a>. I understand that the personal data being collected by the university will be devoted only for the identified primary and secondary purposes. I also understand that my personal data will be handled strictly by the authorized personnel of the university in accordance with the University of Baguio Privacy Manual. I am hereby giving my consent for the processing of my personal data including those of my parents / guardian stated in my student directory by the authorized personnel of the university for the identified primary and secondary purposes. The processing of my personal data may include any, several or all of the following: (1) collection, (2) use, (3) retention, (4) storage, (5) disposal, (6) disclosure, (7) sharing, and (8) other similar acts. This is without prejudice to my right to withdraw my consent at a later date or to object to the further processing of my personal data in accordance with the Data Privacy Act and its Implementing Rules and Regulations, the University of Baguio Privacy Policy, and the University of Baguio Privacy Manual. I am hereby giving my consent this date in the University of Baguio, Baguio City, Philippines.
                        </p>
                    </div>
                    <div role="" aria-label="Basic outlined example " class="text-center mb-4">
                        {{-- <a href="https://ubaguio.edu/admission-enrollment/" class="btn btn-secondary">No</a> --}}
                        <div class="form-check-inline">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="consent"
                                    id="yes" value="yes" onclick="show(0)">
                                <label class="form-check-label mr-4" for="yes">
                                    Yes, I have read and understood
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="consent" id="no"
                                    value="no" onclick="show(1)">
                                <label class="form-check-label" for="no">
                                    No
                                </label>
                            </div>
                        </div>
                        <div id="proceed" style="display:none;" class="text-center mt-3">
                            <a href="{{ route('registration-form') }}" class="btn btn-primary">Proceed</a>
                        </div>
                    </div>

                </div>
        </div>
    </form>
    <script>
        function show(x) {
            console.log(x);
            if (x == 0) {
                document.getElementById("proceed").style.display = "block";
            } else {
                document.getElementById("proceed").style.display = "none";
            }
        }
    </script>
        <!-- <script>
            function myFunction() {
                let text = "I have read and understood the University of Baguio Privacy Policy which is posted at www.ubaguio.edu";

                if (confirm(text) == true) {
                    location.href = "ubaguio.edu";
                } else {
                    text = "You canceled!";
                }
                document.getElementById("demo").innerHTML = text;
            }
        </script> -->
{{-- <!-- @include('registerstudents.index_script') --> --}}
@endsection
