@extends('generatePDF.layout')

@section('content')
    <header>
        {{-- <table>
            <tr>
                <td style="text-align:center; font-size:15px;"> <b>ADMISSION AND RECORD CENTER</b><br> General Luna Rd.,
                    Baguio City, Philippines 2600</td>
            </tr>
        </table>
        <hr style="margin-top:0; margin-bottom:0;">
        <table>
            <tr>
                <td style="text-align:center; width:30%; font-size:13px;">Telefax No.: (074) 442-3071
                </td>
                <td style="text-align:center; font-size:13px;">Website: www.ubaguio.edu</td>
                <td style="text-align:center; font-size:13px;">Email Address: registrar@ubaguio.edu</td>
            </tr>
        </table> --}}
        <table>
            <tr>
                <td rowspan="2" style="width:20%; float:none; height:10px">&nbsp;<img
                        src="{{ public_path('images/ubheadt.png') }}" style="width: 90%; display:block;">
                </td>
                <td style="width:30%; text-align:center; font-size:13px;">Reference No.: QF-ARC-003</td>
                <td style="width:16%;  text-align:center; font-size:13px;">Revision No: 01</td>
                <td style="width:30%;  text-align:center; font-size:13px;">Effectivity Date: December 1, 2020</td>
            </tr>
            <tr>
                <td colspan="3" style="padding:10px; text-align:center; font-size:15px"><b>REQUEST SLIP FOR OFFICIAL TRANSCRIPT OF RECORDS</b></td>
            </tr>
        </table>
    </header>
    {{-- BODY --}}
    <div>
        <div style="float: right;">
            <br>
            <u>_____________________________</u>
        </div>
        <br><br>
        <div>
            <b style="font-size:13px">The Registrar</b>
        </div>
        <div>
            <u>_____________________________</u>
            <br>
            <u>_____________________________</u>
        </div>
        <br>
        <div>
            <p style="font-size:13px">Sir / Madam:</p>
            <p style="font-size:13px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please furnish us original copies of
                <b> TRANSCRIPT OF RECORDS (OTR)</b> of the following student/s who is/
                are temporarily enrolled in the <b>UNIVERSITY OF BAGUIO</b>:
            </p>
        </div>

    </div>
    <div class="table-responsive">
        {{-- <h3 style="text-align:center; font-size:18px;">REQUEST FOR FORM-137 FOR THE FOLLOWING STUDENT</h3> --}}
        <table class="bodytable">
            <thead>
                <tr>
                    <th class="bodyth" style="text-align:center; font-size:11px; width:50%">Name/s</th>
                    <th class="bodyth" style="text-align:center; font-size:11px; width:50%">Last Year Attended</th>
                    {{-- <th class="bodyth" style="text-align:center; font-size:15px;">Date Recieved</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bodytd" style="text-align:center; font-size:12px; width:50%">{{ $name }}</td>
                    <td class="bodytd" style="text-align:center; font-size:12px; width:50%">{{ $date }}</td>
                    {{-- <td class="bodytd" style="text-align:center; font-size:15px;"></td> --}}
                </tr>
                <tr>
                    <td class="bodytd" style="text-align:center; font-size:12px;"></td>
                    <td class="bodytd" style="text-align:center; font-size:12px;"></td>
                    {{-- <td class="bodytd" style="text-align:center; font-size:15px;"></td> --}}
                </tr>
                <tr>
                    <td class="bodytd" style="text-align:center; font-size:12px;"></td>
                    <td class="bodytd" style="text-align:center; font-size:12px;"></td>
                    {{-- <td class="bodytd" style="text-align:center; font-size:15px;"></td> --}}
                </tr>

            </tbody>
        </table>
        <p style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thank you.</p>
        <div>
            <p style="font-size:11px">______ 1<sup>st</sup> Request</p>
            <p style="font-size:11px">______ 2<sup>nd</sup> Request</p>
            <p style="font-size:11px">______ 3<sup>rd</sup> Request</p>
            <p>_____ <b style="font-size:12px">PLEASE ENTRUSTTOTHE BEARER IN A SEALED ENVELOPE</b></p>
        </div>
    </div>
    <footer>
        <div style="float: right;">
            <p style="font-size: 12px">Very truly yours,</p>
            <div style="text-align: center">
                <b style="text-decoration: underline; font-size: 11px">MEDARDO F. ABARIENTOS, MACT</b>
                <p style="font-size:12px">Registrar</p>
            </div>
        </div>
        <br><br><br><br><br>
        <div style="float: left;">
            <b style="font-size: 12px">NOTE: Please indicate issued for University of Baguio. <br>
            <b style="font-size: 10px">PLEASE ENTRUST IT TO THE BEARER THE REQUESTED DOCUMENT IN A SEALED ENVELOPE SIGNED<br>
                ACROSS THE FLAP BY THE REGISTRAR. THANK YOU VERY MUCH.</b>
        </div>
    </footer>
@endsection
