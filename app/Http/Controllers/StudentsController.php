<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificateUploads;
use App\Models\ConsentFormUploads;
use App\Models\Students;
use App\Models\Courses;
use App\Models\GoodMoralUploads;
use App\Models\GradeUploads;
use App\Models\RecieptUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\RegistrationUploads;
use App\Models\StudentPassports;
use App\Models\StudentPreviousSchools;
use App\Models\WaiverFormUploads;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use PDF;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        //<button type="button" id="btnUpdateStatus" class="btn btn-outline-success btn-sm" data-id=" '. $row->registration_id .' ">Update Status</button>
        // <a href="'. route('updateStatus',[$row->registration_id]).'" id="studentID" name="studentID" data-id="'. $row->registration_id .' ">
        //                         <button>Update Status</button>
        //                     </a>
        // dd($request->year);
        $studentQuery = Students::latest()->get();
        $departments = $studentQuery->sortBy('department')->pluck('department')->unique();
        $entrance_stat = $studentQuery->sortBy('entrance_status')->pluck('entrance_status')->unique();
        $status = $studentQuery->sortBy('status')->pluck('status')->unique();
        $courses = $studentQuery->sortBy('course')->pluck('course')->unique();
        $years = DB::table('students')->select(DB::raw('YEAR(created_at) as year'))->orderBy('year', 'asc')->distinct()->pluck('year');
        // dd(($years));
        $courseDept = $studentQuery->where('department', Auth::user()->department)->sortBy('course')->pluck('course')->unique();
        $statusDept = Students::where('status', '=', 'for approval')
            ->orWhere('status', '=', 'for encoding/enrollment')
            ->pluck('status')->unique();
        $gradeQuery = DB::table('students')
            ->join('grade_uploads', 'grade_uploads.upload_id', '=', 'students.registration_id')
            ->select('grade_uploads.requested_on')
            ->get();
        try {
            //datatable query for retrieving data rows in db
            if ($request->ajax()) {
                // $data = Records::latest()->get();
                $user = Auth::user();
                if ($request->start_date == '') {
                    if ($user->is_admin == 1) {
                        $data = Students::query();
                        $year = $request->input('year');
                        if ($year) {
                            $data->whereYear('created_at', $year);
                        }
                    } elseif ($user->is_admin == 3) {
                        $data = Students::where([
                            ['department', '=', $user->department],
                            ['entrance_status', '=', 'transferee']
                        ])
                            ->where(function ($status) {
                                $status->where('status', '=', 'for approval')
                                    ->orWhere('status', '=', 'for encoding/enrollment');
                            })
                            ->get();
                    } else {
                        $data = Students::query();
                    }
                } else {
                    if ($user->is_admin == 1) {
                        // $data = Students::query()->whereBetween('created_at',[$request->input('start_date'), $request->input('end_date')])
                        // ->get();
                        $data = Students::query()->whereBetween(Students::raw('MONTH(created_at)'), [$request->input('start_date'), $request->input('end_date')])
                            // ->whereYear('created_at','=', $request->year)
                            ->get();
                        //IF YEAR IS SELECTED IT WILL FURTHER FILTER THE $data for the year required
                        $year = $request->input('year');
                        if ($year) {
                            $data->whereYear('created_at', $year);
                        }
                    } elseif ($user->is_admin == 3) {
                        $data = Students::query()->whereBetween('created_at', [$request->input('start_date'), $request->input('end_date')]);
                        $data->where([
                            ['department', '=', $user->department],
                            ['entrance_status', '=', 'transferee']
                        ])
                            ->where(function ($status) {
                                $status->where('status', '=', 'for approval')
                                    ->orWhere('status', '=', 'for encoding/enrollment');
                            })
                            ->get();
                        $year = $request->input('year');
                        if ($year) {
                            $data->whereYear('created_at', $year);
                        }
                    } else {
                        $data = Students::query();
                    }
                }


                return DataTables::of($data)
                    ->addColumn('name', function ($row) {
                        return $row->lname . ' , ' . $row->fname . ' ' . $row->mname;
                    })
                    ->addColumn('names', function ($row) {
                        return $row->lname . ' , ' . $row->fname . ' ' . $row->mname;
                    })
                    ->addColumn('date_registered', function ($row) {
                        return $row->created_at->format('M/d/Y h:i A');
                    })
                    ->addColumn('action', function ($row) {
                        $user = Auth::user();
                        if ($user->is_admin == 1) {
                            $actionBtn = '
                                <a href="/students/' . $row->registration_id . '" class="edit btn btn-info btn-sm" title="View Student"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> View Student </a>
                                    <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id="' . $row->registration_id . ' "><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> </button>';
                        } else if ($user->is_admin == 3) {
                            $actionBtn = ' <a href="/students/' . $row->registration_id . '" class="edit btn btn-secondary btn-sm" title="View Record"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> View Student</a>';
                        } else {
                            $actionBtn = '';
                        }
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->editColumn('updated_at', function ($row) {
                        return [
                            'display' => e($row->updated_at->format('M/d/Y h:i A')),
                            'timestamp' => $row->updated_at->timestamp
                        ];
                    })
                    ->editColumn('created_at', function ($row) {
                        return [
                            'display' => e($row->created_at->format('Y')),
                            'timestamp' => $row->created_at->timestamp
                        ];
                    })
                    // ->filterColumn('updated_at', function ($query, $keyword) {
                    //     $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y %H:%i'') LIKE ?", ["%$keyword%"]);
                    //  })
                    ->make(true);
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Error Retrieving Data');
        }
        $image = '../public/images/header.png';

        // Read image path, convert to base64 encoding
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $data = file_get_contents($image);

        $imgData = base64_encode($data);

        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data:image/' . $type . ';base64,' . $imgData;

        // $pdfHeader = view('generatePDF._header')->render();

        $image = '../public/images/numb.png';

        // Read image path, convert to base64 encoding
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $data = file_get_contents($image);

        $imgData = base64_encode($data);

        // Format the image SRC:  data:{mime};base64,{data};
        $src1 = 'data:image/' . $type . ';base64,' . $imgData;

        // $pdfHeader = view('generatePDF._header')->render();



        return view('students.index', compact('departments', 'entrance_stat', 'status', 'courses', 'courseDept', 'statusDept', 'src', 'src1', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function header()
    {
        return view('generatePDF._header');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students, $registration_id)
    {
        //
        $studentQuery = Students::find($registration_id);

        $studentInfoQuery = DB::table('students')
            ->join('student_passports', 'student_passports.registration_id', '=', 'students.registration_id')
            ->join('student_previous_schools', 'student_previous_schools.registration_id', '=', 'students.registration_id')
            ->where('students.registration_id', '=', $studentQuery->registration_id)
            ->get();
        $studentInfoQueryFil = DB::table('students')
            ->join('student_previous_schools', 'student_previous_schools.registration_id', '=', 'students.registration_id')
            ->where('students.registration_id', '=', $studentQuery->registration_id)
            ->get();
        // dd($studentInfoQuery);
        //join uploads table to show both record and files
        $uploadQuery = DB::table('students')
            ->join('waiver_form_uploads', 'waiver_form_uploads.upload_id', '=', 'students.registration_id')
            ->where('waiver_form_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();

        $birthQuery = DB::table('students')
            ->join('birth_certificate_uploads', 'upload_id', '=', 'students.registration_id')
            ->where('birth_certificate_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();

        $consenthQuery = DB::table('students')
            ->join('consent_form_uploads', 'consent_form_uploads.upload_id', '=', 'students.registration_id')
            ->where('consent_form_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $moralQuery = DB::table('students')
            ->join('good_moral_uploads', 'good_moral_uploads.upload_id', '=', 'students.registration_id')
            ->where('good_moral_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $gradeQuery = DB::table('students')
            ->join('grade_uploads', 'grade_uploads.upload_id', '=', 'students.registration_id')
            ->where('grade_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $recieptQuery = DB::table('students')
            ->join('reciept_uploads', 'reciept_uploads.upload_id', '=', 'students.registration_id')
            ->where('reciept_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();

        return view('students.student', compact('studentInfoQuery', 'studentInfoQueryFil', 'uploadQuery', 'birthQuery', 'consenthQuery', 'moralQuery', 'gradeQuery', 'recieptQuery'))->with('studentQuery', $studentQuery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $studentQuery = Students::find($student);

        //Join uploads table to retrieve data
        $studentInfoQuery = DB::table('students')
            ->join('student_passports', 'student_passports.registration_id', '=', 'students.registration_id')
            ->join('student_previous_schools', 'student_previous_schools.registration_id', '=', 'students.registration_id')
            ->where('students.registration_id', '=', $studentQuery->registration_id)
            ->get();
        $studentInfoQueryFil = DB::table('students')
            ->join('student_previous_schools', 'student_previous_schools.registration_id', '=', 'students.registration_id')
            ->where('students.registration_id', '=', $studentQuery->registration_id)
            ->get();
        // dd($studentInfoQuery);
        //join uploads table to show both record and files
        $uploadQuery = DB::table('students')
            ->join('waiver_form_uploads', 'waiver_form_uploads.upload_id', '=', 'students.registration_id')
            ->where('waiver_form_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();

        $birthQuery = DB::table('students')
            ->join('birth_certificate_uploads', 'upload_id', '=', 'students.registration_id')
            ->where('birth_certificate_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();

        $consenthQuery = DB::table('students')
            ->join('consent_form_uploads', 'consent_form_uploads.upload_id', '=', 'students.registration_id')
            ->where('consent_form_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $moralQuery = DB::table('students')
            ->join('good_moral_uploads', 'good_moral_uploads.upload_id', '=', 'students.registration_id')
            ->where('good_moral_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $gradeQuery = DB::table('students')
            ->join('grade_uploads', 'grade_uploads.upload_id', '=', 'students.registration_id')
            ->where('grade_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $recieptQuery = DB::table('students')
            ->join('reciept_uploads', 'reciept_uploads.upload_id', '=', 'students.registration_id')
            ->where('reciept_uploads.upload_id', '=', $studentQuery->registration_id)
            ->get();
        $courses = Courses::all();
        $entrance_stat = ['returning_first_year', 'incoming_first_year', 'transferee'];


        return view('students.edit', compact('studentInfoQuery', 'studentInfoQueryFil', 'uploadQuery', 'birthQuery', 'consenthQuery', 'moralQuery', 'gradeQuery', 'recieptQuery', 'courses', 'entrance_stat'))->with('studentQuery', $studentQuery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students, $registration_id)
    {
        //
        // $birthcertQuery = BirthCertificateUploads::find($registration_id);
        // $gradeQuery = GradeUploads::find($registration_id);
        // $waiverQuery = WaiverFormUploads::find($registration_id);
        // $recieptQuery = RecieptUploads::find($registration_id);
        // $moralQuery = GoodMoralUploads::find($registration_id);
        // $consenthQuery = ConsentFormUploads::find($registration_id);
        $studentQuery = Students::find($registration_id);
        $passportQueryCheck = DB::table('student_passports')
            ->where('student_passports.registration_id', '=', $studentQuery->registration_id)
            ->first();
        $schoolQueryCheck = DB::table('student_previous_schools')
            ->where('student_previous_schools.registration_id', '=', $studentQuery->registration_id)
            ->first();
        $validator = Validator::make(
            $request->all(),
            [
                // 'student_id' => ['required'],
                'entrance_status' => ['required'],
                'fname' => ['required'],
                'mname' => ['required'],
                'lname' => ['required'],
                // 'old_id' => [Rule::when($request->entrance_status == 'returning_first_year', ['required', 'numeric'])],
                'program' => ['required', 'not_in:Program'],
                'nationality' => ['required'],
                'address' => ['required'],
                'email' => ['required', 'email'],
                'last_school_name' => ['required'],
                'year_graduated' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date("Y")],
                'pnum' => ['required'],
                // 'city_prov' => ['required'],
                // 'brngy_town' => ['required'],
                // 'prev_sch_bnlb' => ['required'],
                // 'prev_school_bname' => ['required'],
                // 'prev_sch_brngy_name' => ['required'],
                // 'prev_sch_city_town' => ['required'],
                // 'prev_sch_prov' => ['required'],
                // 'prev_sch_reg' => ['required'],
                'prev_sch_country' => ['required'],
                'prev_sch_zip' => ['required', 'numeric'],
                'passport_num' => [Rule::when($request->nationality != 'Filipino', ['required'])],
                'dpissued' =>  [Rule::when($request->nationality != 'Filipino', ['required'])],
                'dpexpiry' =>  [Rule::when($request->nationality != 'Filipino', ['required'])],
                'acr_icard_num' =>  [Rule::when($request->nationality != 'Filipino', ['required', 'numeric'])],
            ],
            [
                // 'student_id.required' => 'Student ID is required',
                'entrance_status.required' => 'Please choose an entrance status.',
                'fname.required' => 'First name is required.',
                'mname.required' => 'Middle name is required.',
                'old_id.required' => 'Please enter your previous/old ID number',
                'old_id.numeric' => 'Please enter numbers only.',
                'lname.required' => 'Last name is required.',
                'program.required' => 'Please choose a course/program.',
                // 'program.min' => 'Please choose a course/program.',
                'nationality.required' => 'Nationality is required.',
                'address.required' => 'Address is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'last_school_name.required' => 'Please enter the full name of your previous school.',
                'year_graduated.digits' => 'Please enter a valid/acceptable year.',
                'year_graduated.integer' => 'Please enter a valid/acceptable year.',
                'year_graduated.min' => 'Year cannot be less than 1900.',
                'year_graduated.max' => 'Year cannot be more than current year.',
                'pnum.required' => 'Contact Number is required.',
                'pnum.regex' => 'Please enter numbers only,(s\-\+\(\)) symbols are accepted.',
                'city_prov.required' => 'This field is required.',
                // 'brngy_town.required' => 'First name is required.',
                // 'prev_sch_bnlb.required' => 'First name is required.',
                // 'prev_school_bname.required'  => 'First name is required.',
                // 'prev_sch_brngy_name.required' => 'First name is required.',
                // 'prev_sch_city_town.required' => 'First name is required.',
                // 'prev_sch_prov.required' => 'First name is required.',
                // 'prev_sch_reg.required' => 'First name is required.',
                'prev_sch_country.required' => 'Country where your Previous School is located is required.',
                'prev_sch_zip.required'  => 'Zip Code is required.',
                'prev_sch_zip.numeric'  => 'Please enter valid Zip Code.',
                'passport_num.required' => 'Passport Number is required.',
                'dpissued.required' => 'Passport Date Issued is required.',
                'dpexpiry.required' => 'Passport Expiry Date is required..',
                'acr_icard_num.required' => 'ACR-ICARD Number is required.',
                'acr_icard_num.numeric' => 'ACR-ICARD Number must only contain numbers.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!$passportQueryCheck) {
            $passportQuery = new StudentPassports();
        } else {
            $passportQuery = StudentPassports::find($registration_id);
        }
        if (!$schoolQueryCheck) {
            $schoolQuery = new StudentPreviousSchools();
        } else {
            $schoolQuery = StudentPreviousSchools::find($registration_id);
        }

        // dd($request->input('student_id'));
        try {
            if ($request->hasFile('grades')) {
                foreach ($request->file('grades') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;
                    $studentId = $request->input('student_id');

                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['student_id'] = $studentId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = GradeUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                // DB::table('grade_uploads')->upsert($insert, ['filename','student_id'] ['filepath']);
                GradeUploads::upsert($insert, ['filename', 'student_id']);

                // dd($request);
                // GradeUploads::updateorCreate(['upload_id' => $registration_id],$insert);
            }
            if ($request->hasfile('grades')) {
                foreach ($request->file('grades') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            $recieved = GradeUploads::find($registration_id);
            if ($recieved->recieved_at == null) {
                $recieved->recieved_at = Carbon::now();
                $recieved->save();
            }
            // END OF GRADES
            if ($request->hasFile('good_moral_cert')) {
                foreach ($request->file('good_moral_cert') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;

                    $insert[$key]['student_id'] = $request->input('student_id');
                    $insert[$key]['upload_id'] = $studentQuery->registration_id;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = GoodMoralUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                // DB::table('good_moral_uploads')
                // ->upsert($insert,['upload_id' => $registrationId, 'student_id' => $request->input('student_id'),'filename' => $name, 'filepath' => $path, ],['filename' => $name] ['filepath']);
                GoodMoralUploads::upsert($insert, ['filename', 'student_id']);
            }
            if ($request->hasfile('good_moral_cert')) {
                foreach ($request->file('good_moral_cert') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF GOOD MORAL
            if ($request->hasFile('accomp_consent_form')) {
                foreach ($request->file('accomp_consent_form') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;

                    $insert[$key]['student_id'] = $request->input('student_id');
                    $insert[$key]['upload_id'] = $studentQuery->registration_id;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = ConsentFormUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                ConsentFormUploads::upsert($insert, ['filename', 'student_id']);
            }
            if ($request->hasfile('accomp_consent_form')) {
                foreach ($request->file('accomp_consent_form') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF CONSENT
            if ($request->hasFile('birth_cirt')) {
                foreach ($request->file('birth_cirt') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;

                    $insert[$key]['student_id'] = $request->input('student_id');
                    $insert[$key]['upload_id'] = $studentQuery->registration_id;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = BirthCertificateUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                BirthCertificateUploads::upsert($insert, ['filename', 'student_id']);
            }
            if ($request->hasfile('birth_cirt')) {
                foreach ($request->file('birth_cirt') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF BIRTH CERTIFICATE
            if ($request->hasFile('accomp_dec_wform')) {
                foreach ($request->file('accomp_dec_wform') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;

                    $insert[$key]['student_id'] = $request->input('student_id');
                    $insert[$key]['upload_id'] = $studentQuery->registration_id;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = WaiverFormUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                WaiverFormUploads::upsert($insert, ['filename', 'student_id']);
            }
            if ($request->hasfile('accomp_dec_wform')) {
                foreach ($request->file('accomp_dec_wform') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF WAIVER
            if ($request->hasFile('reciept')) {
                foreach ($request->file('reciept') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registration_id;

                    $insert[$key]['student_id'] = $request->input('student_id');
                    $insert[$key]['upload_id'] = $studentQuery->registration_id;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                }
                $validateFile = RecieptUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                RecieptUploads::upsert($insert, ['filename', 'student_id']);
            }
            if ($request->hasfile('reciept')) {
                foreach ($request->file('reciept') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF RECIEPT
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        } finally {
            $studentQuery->registration_id = $studentQuery->registration_id;
            $studentQuery->entrance_status = $request->input('entrance_status');
            $studentQuery->student_id = $request->input('student_id');
            $studentQuery->fname = $request->input('fname');
            $studentQuery->mname = $request->input('mname');
            $studentQuery->lname = $request->input('lname');
            $studentQuery->course = $request->input('program');

            $department_query = Courses::join('departments', 'departments.departmentID', '=', 'courses.departmentID')
                ->where('courses.course_acronym', '=', $request->input('program'))
                ->first();
            // dd($department_query);

            $department = $department_query->department_acronym;
            $studentQuery->department = $department;
            $studentQuery->nationality = $request->input('nationality');


            $studentQuery->status = 'pending';
            $studentQuery->address = $request->input('address');
            $studentQuery->email = $request->input('email');
            $studentQuery->pnum = $request->input('pnum');
            $studentQuery->city_prov = $request->input('city_prov');
            $studentQuery->brngy_town = $request->input('brngy_town');
            $studentQuery->school = $request->input('last_school_name');
            $studentQuery->date = $request->input('year_graduated');
            //save first to create record ID to be referenced in Upload tbl
            $studentQuery->save();

            $schoolQuery->last_school_name = $request->input('last_school_name');
            $schoolQuery->year_graduated = $request->input('year_graduated');
            $schoolQuery->prev_sch_bnlb = $request->input('prev_sch_bnlb');
            $schoolQuery->prev_school_bname = $request->input('prev_school_bname');
            $schoolQuery->prev_sch_str_name = $request->input('prev_sch_str_name');
            $schoolQuery->prev_sch_brngy_name = $request->input('prev_sch_brngy_name');
            $schoolQuery->prev_sch_city_town = $request->input('prev_sch_city_town');
            $schoolQuery->prev_sch_prov = $request->input('prev_sch_prov');
            $schoolQuery->prev_sch_reg = $request->input('prev_sch_reg');
            $schoolQuery->prev_sch_country = $request->input('prev_sch_country');
            $schoolQuery->prev_sch_zip = $request->input('prev_sch_zip');
            $schoolQuery->registration_id = $studentQuery->registration_id;

            $schoolQuery->save();
            // $registrationQuery->prev_school()->save($schoolQuery);

            //Passport

            // $dpissued = $request->input('dpissued');
            // $formatdpissued = date("YYYY-mm-dd", strtotime($dpissued));
            // $dpexpiry = $request->input('dpexpiry');
            // $formatdpexpiry = date("YYYY-mm-dd", strtotime($dpexpiry));

            // $passportQuery->dpissued = Carbon::createFromFormat('m/d/Y', $request->input('dpissued'))->format('Y-m-d');
            // $passportQuery->dpexpiry = Carbon::createFromFormat('m/d/Y', $request->input('dpexpiry'))->format('Y-m-d');
            if ($request->input('nationality') == 'Filipino' || $request->input('nationality') == 'filipino') {
            } else {

                $passportQuery->registration_id = $studentQuery->registration_id;
                $passportQuery->passport_num = $request->input('passport_num');
                $passportQuery->dpissued = $request->input('dpissued');
                $passportQuery->dpexpiry = $request->input('dpexpiry');
                $passportQuery->acr_icard_num = $request->input('acr_icard_num');

                // dd($passportQuery);
                $passportQuery->save();
            }
        }
        alert()->success('success', 'Student Registration Information and Files were Updated Successfully!');
        return redirect('/students/' . $registration_id);
    }
    public function generateGradePDF($id)
    {
        $student = Students::find($id);
        $year = StudentPreviousSchools::find($id);
        // dd($student);
        // dd($student->year_graduated);
        if (!GradeUploads::find($id)) {
            $grade = new GradeUploads();
            $grade->upload_id = $student->registration_id;
            $grade->requested_on = Carbon::now();
            $grade->save();
        }
        // $name =  $student->lname . ', ' . $student->fname .' '. $student->mname;
        // $date = Carbon::now();
        // return view('students.grade_request',compact('name','date'));

        $data = [
            'name' =>  $student->lname . ', ' . $student->fname . ' ' . $student->mname,
            // 'date' => Carbon::now()->format('M-d-Y h:i A'),
            'date' => $student->date,
        ];

        $pdf = PDF::loadView('generatePDF.grade', $data);
        $pdf->setPaper('letter');
        // $pdf->setOptions([
        //     'header-html' => view('generatePDF._header'),
        // ]);
        // $pdf->setOptions([
        //     'footer-html' => view('generatePDF._footer'),
        // ]);
        // $pdf->setOptions([
        //     'margin-top' => 0,
        //     'enable-javascript' => true,
        //     'page-size' => 'a4'
        // ]);
        return $pdf->stream($student->lname . '_Form-137-Request.pdf');
        // return redirect()->route('students.show',$id);
        // return back();
    }
    public function recievedGrade($id)
    {
        $student = Students::find($id);
        // dd($student);
        if (!GradeUploads::find($id)) {
            $grade = new GradeUploads();
            $grade->upload_id = $student->registration_id;
            $grade->recieved_at = Carbon::now();
            $grade->save();
        } else {
            $grade = GradeUploads::find($id);
            $grade->recieved_at = Carbon::now();
            $grade->save();
        }
        return back();
    }
    public function addStudentId(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'student_id' => ['required', 'numeric'],
            ],
            [
                'student_id.required' => 'Student ID is required',
                'student_id.numeric' => 'Student ID must be numeric',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = Students::find($id);

        $student->student_id = $request->input('student_id');
        $student->status = 'for encoding/enrollment';
        $student->save();

        //INSERT STUDENT ID TO FILES
        if (GradeUploads::find($id)) {
            $query = GradeUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }
        if (ConsentFormUploads::find($id)) {
            $query = ConsentFormUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }
        if (WaiverFormUploads::find($id)) {
            $query = WaiverFormUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }
        if (RecieptUploads::find($id)) {
            $query = RecieptUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }
        if (GoodMoralUploads::find($id)) {
            $query = GoodMoralUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }
        if (BirthCertificateUploads::find($id)) {
            $query = BirthCertificateUploads::find($id);
            $query->student_id = $request->input('student_id');
            $query->save();
        }

        // dd($student);
        return back();
    }


    public function updateStatusDrop($id)
    {
        $student = DB::table('students')->select('*')->where('students.registration_id', $id)->first();
        DB::table('students')
            ->where('students.registration_id', $id)
            ->update(['students.status' => 'dropped']);
        return redirect()->route('students.index');
    }


    public function updateStatus($id)
    {
        $studentQu = new Students();
        // $id = $request->registration_id;
        // $id = $id;
        // $student = Students::find($id)->first();
        // $student = DB::table('students')->select('*')->where('students.registration_id', $id)->first();
        $student = Students::find($id);
        // $student = Students::where('students.registration_id', $registration_id)->pluck('students')->get();
        // dd($student);
        if ($student->status == 'pending') {
            // DB::table('students')
            // ->where('students.status', 'pending')
            // ->where('registration_id', $id)
            // ->update(['students.status' => 'for approval']);
            if ($student->entrance_status == 'incoming_first_year') {
                $student->status = 'for id';
            }
            // elseif ($student->entrance_status == 'returning_first_year') {
            //     $student->status = 'for id';
            // }
            else {
                $student->status = 'for approval';
            }

            $student->save();
        } elseif ($student->status == 'for approval' and  empty($student->student_id)) {
            // DB::table('students')
            // ->where('students.status', 'for approval')
            // ->where('students.registration_id', $id)
            // ->update(['students.status' => 'for id']);
            $student->status = 'for id';
            $student->save();
        } elseif ($student->status == 'for id') {
            // DB::table('students')
            // ->where('students.status', 'for id')
            // ->where('students.registration_id', $id)
            // ->update(['students.status' => 'for encoding/enrollment']);
            $student->status = 'for encoding/enrollment';
            $student->save();
            // $studentId->status = 'for_encoding/enrollment';
            // $studentId->save();
        } elseif ($student->status == 'for approval' and !empty($student->student_id)) {
            // DB::table('students')
            // ->where('students.status', 'for approval')
            // ->where('students.registration_id', $id)
            // ->update(['students.status' => 'for encoding/enrollment']);
            $student->status = 'for encoding/enrollment';
            $student->save();
        } elseif ($student->status == 'for encoding/enrollment') {
            $student->status = 'registered';
            $student->save();
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students, $registration_id)
    {
        //
        $registration_id = $registration_id;
        try {
            $recordQuery = $students::find($registration_id);
            $recordQuery->delete();
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        }

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
