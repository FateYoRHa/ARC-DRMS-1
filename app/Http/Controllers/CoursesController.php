<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $courses = Courses::join('departments', 'departments.departmentID', 'courses.departmentID')
            ->select('departments.department_acronym', 'courses.courseID', 'courses.course', 'courses.departmentID', 'courses.course_acronym', 'courses.created_at', 'courses.updated_at');
        // dd($courses);
        $departments = Departments::join('courses', 'courses.departmentID', 'departments.departmentID')
            ->select('departments.department_acronym', 'courses.departmentID', 'departments.departmentID')
            ->get()->unique();
        try {
            //datatable query for retrieving data rows in db

            if ($request->ajax()) {
                // $data = Records::latest()->get();
                $data = Courses::query();
                // $data = Courses::join('departments', 'departments.departmentID', 'courses.departmentID')
                //     ->select(['departments.department_acronym', 'courses.departmentID', 'courses.courseID', 'courses.course', 'courses.course_acronym', 'courses.created_at', 'courses.updated_at']);
                return DataTables::eloquent($data)
                    ->addColumn('action', function ($row) {
                        $user = Auth::user();
                        $students = Students::where('course', $row->course_acronym)
                            ->get();
                        if ($user->is_admin == 1) {
                            // href="/students/' . $row->registration_id . '"
                            $actionBtn =
                                '

                                    <a href="/courses/' . $row->courseID . '"  class="edit btn btn-info btn-sm" title="Preview"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> Preview </a>

                                    <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id="' . $row->courseID . ' " student-count = " ' . $students->count() . ' " ><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> </button>



                            ';
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
                            'display' => e($row->updated_at->format('M/d/Y h:i A')),
                            'timestamp' => $row->updated_at->timestamp
                        ];
                    })
                    ->editColumn('department', function ($row) {
                        $department = Departments::where('departmentID', '=', $row->departmentID)
                            ->get('department_acronym');
                        foreach ($department as $dept) {
                            $department = $dept->department_acronym;
                        }
                        return $department;
                    })
                    // ->filterColumn('updated_at', function ($query, $keyword) {
                    //     $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y %H:%i'') LIKE ?", ["%$keyword%"]);
                    // })
                    ->make(true);
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Error Retrieving Data');
        }

        return view('courses.index', compact('courses', 'departments'));
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
        //
        $validator = Validator::make(
            $request->all(),
            [
                'course' => ['required'],
                'course_acronym' => ['required'],
                'departmentID' => ['required','not_in:-1'],
            ],
            [
                'course.required' => 'Department field is required.',
                'course_acronym.required' => 'Department Acronym is required.',
                'departmentID.required' => 'Please choose one of the departments.',
                'departmentID.not_in' => 'Please choose one of the departments.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $course = new Courses();

        $course->course = $request->input('course');
        $course->course_acronym = $request->input('course_acronym');
        $course->departmentID = $request->input('departmentID');
        $course->save();

        return redirect()->back()->with('success', 'New Course was Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Courses $courses, $courseID)
    {
        //
        $courseQuery = Courses::find($courseID);
        $courses = Courses::join('departments', 'departments.departmentID', 'courses.departmentID')
            ->where('courses.courseID', $courseID)
            ->select('departments.department_acronym', 'departments.department', 'courses.courseID', 'courses.course', 'courses.departmentID', 'courses.course_acronym', 'courses.created_at', 'courses.updated_at')
            ->first();
        // dd($courses);
        $departments = Departments::latest()->get();

        // $students = DB::table('students')
        //     ->join('courses', 'courses.course_acronym', 'students.course')
        //     ->where('students.course', $courseQuery->course_acronym)
        //     ->get();
        try {
            //datatable query for retrieving data rows in db

            if ($request->ajax()) {
                // $data = Students::query();
                $data = Students::where('students.status', 'registered')
                    ->where('course', '=', $courseQuery->course_acronym);
                return DataTables::of($data)
                    ->addColumn('name', function ($row) {
                        return $row->lname . ' , ' . $row->fname . ' ' . $row->mname;
                    })
                    ->editColumn('updated_at', function ($row) {
                        return [
                            'display' => e($row->updated_at->format('M/d/Y h:i A')),
                            'timestamp' => $row->updated_at->timestamp
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
        // dd($students);

        return view('courses.course', compact('courses', 'courseID', 'departments'))->with('courseQuery', $courseQuery);
        // return view()('/courses/'.$courseID)->with(compact('courseQuery','courses','students'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses, $courseID)
    {
        //
        // $courses = Courses::latest()->get();
        $validator = Validator::make(
            $request->all(),
            [
                'course' => ['required'],
                'course_acronym' => ['required'],
                'departmentID' => ['required','not_in:-1'],
            ],
            [
                'course.required' => 'Department field is required.',
                'course_acronym.required' => 'Department Acronym is required.',
                'departmentID.required' => 'Please choose one of the departments.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $courseQuery = Courses::find($courseID);
        $students = Students::where('students.status', 'registered')
            ->where('course', '=', $courseQuery->course_acronym)
            ->get();
        $department = Courses::join('departments', 'departments.departmentID', 'courses.departmentID')
            ->select('departments.department_acronym')
            ->first();
        // dd($departments);
        // CHECK IF COURSE EXISTS IN DB
        if (Courses::where('course_acronym', $request->input('course_acronym'))->exists()) {
            alert()->warning('Course Acronym Already Exists');
            return back();
        } elseif (Courses::where('course', $request->input('course'))->exists()) {
            alert()->warning('Course Already Exists');
            return back();
        } else {
            $courseQuery->course = $request->input('course');
            $courseQuery->course_acronym = $request->input('course_acronym');
            $courseQuery->departmentID = $request->input('departmentID');
            $courseQuery->save();
            //CHECK IF STUDENTS ARE ENROLLED
            if ($students->count() > 0) {
                foreach ($students as $student) {
                    $student->course = $request->input('department_acronym');
                    $student->department = $department->department_acronym;
                    $student->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Course was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses, $courseID)
    {
        //
        try {

            $courses = $courses::find($courseID);
            $courses->delete();
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        }

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
