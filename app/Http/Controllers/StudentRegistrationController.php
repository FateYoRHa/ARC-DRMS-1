<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\RegistrationUploads;
use App\Models\StudentPassports;
use App\Models\StudentPreviousSchools;
use Illuminate\Http\Request;
use App\Models\GradeUploads;
use App\Models\RecieptUploads;
use App\Models\WaiverFormUploads;
use App\Models\ConsentFormUploads;
use App\Models\BirthCertificateUploads;
use App\Models\GoodMoralUploads;
use App\Models\Departments;
use App\Models\Courses;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Departments::all();
        $courses = Courses::all();
        return view('registerstudents.consent', compact('courses', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        // dd($request);
        // $val = $this->validator($request->all(), $request)->validate();
        // if($val->fails())
        // {
        //     dd($request);
        //     return back();
        // }
        // dd($val);redirect()->back()->withErrors($validator)->withInput();
        // $y = +1;
        // dd($y);
        $validator = Validator::make(
            $request->all(),
            [
                'entrance_status' => ['required'],
                'fname' => ['required'],
                'mname' => ['required'],
                'lname' => ['required'],
                'old_id' => [Rule::when($request->entrance_status == 'returning_first_year', ['required', 'numeric'])],
                'program' => ['required', 'not_in:Program'],
                'nationality' => ['required'],
                'address' => ['required'],
                'email' => ['required', 'email'],
                'last_school_name' => ['required'],
                'year_graduated' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date("Y")],
                'pnum' => ['required'],
                'city_prov' => ['required'],
                // 'brngy_town' => ['required'],
                // 'prev_sch_bnlb' => ['required'],
                // 'prev_school_bname' => ['required'],
                // 'prev_sch_brngy_name' => ['required'],
                // 'prev_sch_city_town' => ['required'],
                // 'prev_sch_prov' => ['required'],
                // 'prev_sch_reg' => ['required'],
                'prev_sch_country' => ['required'],
                'prev_sch_zip' => ['required', 'numeric'],
                'passport_num' => [Rule::when($request->nationality == 'other', ['required'])],
                'dpissued' =>  [Rule::when($request->nationality == 'other', ['required'])],
                'dpexpiry' =>  [Rule::when($request->nationality == 'other', ['required'])],
                'acr_icard_num' =>  [Rule::when($request->nationality == 'other', ['required', 'numeric'])],
                // 'grades' => 'mimes:jpeg,png,pdf,doc',
                // 'accomp_dec_wform' => ['mimes:jpeg,png,pdf'],
                // 'accomp_consent_form' => ['mimes:jpeg,png,pdf'],
                // 'good_moral_cert' => ['mimes:jpeg,png,pdf'],
                // 'birth_cirt' => ['mimes:jpeg,png,pdf'],
                // 'reciept' => ['mimes:jpeg,png,pdf'],
            ],
            [
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
                // 'grades.mimes' => 'Please attach png/jpeg/pdf files only.',
                // 'accomp_dec_wform.mimes' => 'Please attach png/jpeg/pdf files only.',
                // 'accomp_consent_form.mimes' => 'Please attach png/jpeg/pdf files only.',
                // 'good_moral_cert.mimes' => 'Please attach png/jpeg/pdf files only.',
                // 'birth_cirt.mimes' => 'Please attach png/jpeg/pdf files only.',
                // 'reciept.mimes' => 'Please attach png/jpeg/pdf files only.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request);
        $registrationQuery = new StudentRegistration();
        $passportQuery = new StudentPassports();
        $schoolQuery = new StudentPreviousSchools();
        try {
            // $registrationQuery->registration_id = $request->input('registration_id');
            $registrationQuery->entrance_status = $request->input('entrance_status');
            $registrationQuery->student_id = $request->input('old_id');
            $registrationQuery->fname = $request->input('fname');
            $registrationQuery->mname = $request->input('mname');
            $registrationQuery->lname = $request->input('lname');
            $registrationQuery->course = $request->input('program');

            $department_query = Courses::join('departments', 'departments.departmentID', '=', 'courses.departmentID')
                ->where('courses.course_acronym', '=', $request->input('program'))
                ->first();

            $department = $department_query->department_acronym;
            $registrationQuery->department = $department;
            if ($request->input('nationality') == 'Filipino') {
                $registrationQuery->nationality = $request->input('nationality');
            } else {
                $registrationQuery->nationality = $request->input('other_text');
            }
            $registrationQuery->status = 'pending';
            $registrationQuery->address = $request->input('address');
            $registrationQuery->email = $request->input('email');
            $registrationQuery->pnum = $request->input('pnum');
            $registrationQuery->city_prov = $request->input('city_prov');
            $registrationQuery->brngy_town = $request->input('brngy_town');
            $registrationQuery->school = $request->input('last_school_name');
            $registrationQuery->date = $request->input('year_graduated');

            //save first to create record ID to be referenced in Upload tbl
            $registrationQuery->save();
            // $registrationId= $registrationQuery->registration_id;

            $schoolQuery->registration_id = $registrationQuery->registration_id;
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

            $schoolQuery->save();
            // $registrationQuery->prev_school()->save($schoolQuery);

            //Passport

            // $dpissued = $request->input('dpissued');
            // $formatdpissued = date("YYYY-mm-dd", strtotime($dpissued));
            // $dpexpiry = $request->input('dpexpiry');
            // $formatdpexpiry = date("YYYY-mm-dd", strtotime($dpexpiry));

            // $passportQuery->dpissued = Carbon::createFromFormat('m/d/Y', $request->input('dpissued'))->format('Y-m-d');
            // $passportQuery->dpexpiry = Carbon::createFromFormat('m/d/Y', $request->input('dpexpiry'))->format('Y-m-d');
            if ($request->input('nationality') == 'other') {
                $passportQuery->registration_id = $registrationQuery->registration_id;
                $passportQuery->passport_num = $request->input('passport_num');
                $passportQuery->dpissued = date('Y-m-d', strtotime($request->input('dpissued')));
                $passportQuery->dpexpiry = date('Y-m-d', strtotime($request->input('dpexpiry')));
                $passportQuery->acr_icard_num = $request->input('acr_icard_num');
                // dd($passportQuery);
                $passportQuery->save();
            }
            $registrationQuery->save();
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        } finally {
            // dd($registrationQuery);
            // GRADES
            //Upload file and get record ID to be stored in db for reference
            if ($request->hasfile('grades')) {
                foreach ($request->file('grades') as $gkey => $gfile) {
                    $path = $gfile->store('public/grades');
                    $name = $gfile->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;

                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $ginsert[$gkey]['student_id'] = $request->input('old_id');
                    $ginsert[$gkey]['upload_id'] = $registrationId;
                    $ginsert[$gkey]['filename'] = $name;
                    $ginsert[$gkey]['filepath'] = $path;
                    $ginsert[$gkey]['recieved_at'] = Carbon::now();
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = GradeUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                GradeUploads::insert($ginsert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('grades')) {
                foreach ($request->file('grades') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF GRADES
            // accomp_dec_wform
            if ($request->hasfile('accomp_dec_wform')) {
                foreach ($request->file('accomp_dec_wform') as $key => $file) {
                    $path = $file->store('public/accomp_dec_wform');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;
                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $insert[$key]['student_id'] = $request->input('old_id');
                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = WaiverFormUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                WaiverFormUploads::insert($insert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('accomp_dec_wform')) {
                foreach ($request->file('accomp_dec_wform') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF accomp_dec_wform
            // accomp_consent_form
            if ($request->hasfile('accomp_consent_form')) {
                foreach ($request->file('accomp_consent_form') as $key => $file) {
                    $path = $file->store('public/accomp_consent_form');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;
                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $insert[$key]['student_id'] = $request->input('old_id');
                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = ConsentFormUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                ConsentFormUploads::insert($insert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('accomp_consent_form')) {
                foreach ($request->file('accomp_consent_form') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF accomp_consent_form
            // good_moral_cert
            if ($request->hasfile('good_moral_cert')) {
                foreach ($request->file('good_moral_cert') as $key => $file) {
                    $path = $file->store('public/good_moral_cert');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;
                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $insert[$key]['student_id'] = $request->input('old_id');
                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = GoodMoralUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                GoodMoralUploads::insert($insert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('good_moral_cert')) {
                foreach ($request->file('good_moral_cert') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF good_moral_cert
            // birth_cirt
            if ($request->hasfile('birth_cirt')) {
                foreach ($request->file('birth_cirt') as $key => $file) {
                    $path = $file->store('public/birth_cirt');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;
                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $insert[$key]['student_id'] = $request->input('old_id');
                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = BirthCertificateUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                BirthCertificateUploads::insert($insert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('birth_cirt')) {
                foreach ($request->file('birth_cirt') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF birth_cirt
            // reciept
            if ($request->hasfile('reciept')) {
                foreach ($request->file('reciept') as $key => $file) {
                    $path = $file->store('public/reciept');
                    $name = $file->getClientOriginalName();

                    $registrationId = $registrationQuery->registration_id;
                    // $for_record_id = $registrationQuery->registration_id;

                    // dd($registrationId);
                    $insert[$key]['student_id'] = $request->input('old_id');
                    $insert[$key]['upload_id'] = $registrationId;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    // $insert[$key]['for_registration_id'] = $registrationId;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = RecieptUploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record created without file', 'Duplicate File Found');
                    return back();
                }
                RecieptUploads::insert($insert);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('reciept')) {
                foreach ($request->file('reciept') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
            // END OF reciept
        }


        // RegistrationUploads::updateorCreate(
        //     ['upload_id'=>$request->registration_id], $request->all(),
        // );
        // StudentPreviousSchools::updateorCreate(
        //     ['id'=>$request->registration_id], $request->all(),
        // );
        // Product::updateorCreate(
        //     ['id'=>$request->id], $request->all(),

        // );
        alert()->success('Success', 'Registration successful.');
        return view('registerstudents.consent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        // $departments = Departments::latest()->get();
        // $courses = Courses::latest()->get();
        $courses = Courses::join('departments', 'departments.departmentID', '=', 'courses.departmentID')
            ->get();
        return view('registerstudents.form', compact('courses'));
    }

    public function consent()
    {
        return view('registerstudents.consent');
    }


    public function show(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRegistration $studentRegistration)
    {
        //
    }
}
