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

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $departments = Departments::latest()->get();
        try {
            //datatable query for retrieving data rows in db

            if ($request->ajax()) {
                // $data = Records::latest()->get();
                // $data = Courses::query();
                $data = Departments::latest()->get();
                return DataTables::of($data)
                    ->addColumn('action', function ($row) {
                        $user = Auth::user();
                        $courses = Courses::where('departmentID', $row->departmentID)
                            ->get();
                        if ($user->is_admin == 1) {
                            // href="/students/' . $row->registration_id . '"
                            $actionBtn =
                                '

                                    <a href="/departments/' . $row->departmentID . '"  class="edit btn btn-info btn-sm" title="Preview"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> Preview </a>

                                    <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id="' . $row->departmentID . ' " course-number = " ' . $courses->count() . ' " ><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> </button>



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
                    // ->filterColumn('updated_at', function ($query, $keyword) {
                    //     $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y %H:%i'') LIKE ?", ["%$keyword%"]);
                    // })
                    ->make(true);
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Error Retrieving Data');
        }

        return view('departments.index', compact('departments'));
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
                'department' => ['required'],
                'department_acronym' => ['required'],
            ],
            [
                'department.required' => 'Department field is required.',
                'department_acronym.required' => 'Department Acronym is required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $department = new Departments();

        $department->department = $request->input('department');
        $department->department_acronym = $request->input('department_acronym');
        $department->save();

        return redirect()->back()->with('success', 'New Department Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $departments, Request $request, $departmentID)
    {
        //
        $departmentQuery = Departments::find($departmentID);
        $departments = Departments::join('courses', 'courses.departmentID', 'departments.departmentID')
            ->where('courses.courseID', $departmentID)
            ->select('departments.department_acronym', 'departments.department', 'courses.courseID', 'courses.course', 'courses.departmentID', 'courses.course_acronym', 'courses.created_at', 'courses.updated_at')
            ->first();
        // dd($courses);
        $courses = Departments::latest()->get();

        // $students = DB::table('students')
        //     ->join('courses', 'courses.course_acronym', 'students.course')
        //     ->where('students.course', $courseQuery->course_acronym)
        //     ->get();
        // try {
        //     //datatable query for retrieving data rows in db

        //     if ($request->ajax()) {
        //         // $data = Students::query();
        //         $data = Students::where('students.status', 'registered')
        //         ->where('students.department','=', $departmentQuery->department_acronym);
        //         $courses = Courses::where('courses.departmentID', $departmentID);
        //         return [DataTables::of($data)
        //             ->addColumn('name', function ($row) {
        //                 return $row->lname . ' , ' . $row->fname . ' ' . $row->mname;
        //             })
        //             ->editColumn('updated_at', function ($row) {
        //                 return [
        //                     'display' => e($row->updated_at->format('M/d/Y h:i A')),
        //                     'timestamp' => $row->updated_at->timestamp
        //                 ];
        //             })
        //             // ->filterColumn('updated_at', function ($query, $keyword) {
        //             //     $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y %H:%i'') LIKE ?", ["%$keyword%"]);
        //             //  })
        //             ->make(true),


        //             ];
        //     }

        // } catch (\Exception $e) {
        //     alert()->error('Error', 'Error Retrieving Data');
        // }

        try {
            //datatable query for retrieving data rows in db

            if ($request->ajax()) {
                // $data = Students::query();
                $data = Courses::where('departmentID', $departmentID);
                // dd($data);
                return DataTables::of($data)
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
                    // ->filterColumn('updated_at', function ($query, $keyword) {
                    //     $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y %H:%i'') LIKE ?", ["%$keyword%"]);
                    //  })
                    ->make(true);
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Error Retrieving Data');
        }

        // dd($students);


        return view('departments.department', compact('courses', 'departmentID', 'departments'))->with('departmentQuery', $departmentQuery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $departments, $departmentID)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'department' => ['required'],
                'department_acronym' => ['required'],
            ],
            [
                'department.required' => 'Department field is required.',
                'department_acronym.required' => 'Department Acronym is required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $departmentQuery = Departments::find($departmentID);
        $students = Students::where('students.status', 'registered')
            ->where('department', '=', $departmentQuery->department_acronym)
            ->get();

        $courses = Courses::where('departmentID', $departmentID);
        // dd($departments);
        // CHECK IF COURSE EXISTS IN DB
        if (Departments::where('department_acronym', $request->input('department_acronym'))->exists()) {
            alert()->warning('Department Acronym Already Exists');
            return back();
        } elseif (Departments::where('department', $request->input('department'))->exists()) {
            alert()->warning('Department Already Exists');
            return back();
        } else {
            $departmentQuery->department_acronym = $request->input('department_acronym');
            $departmentQuery->department = $request->input('department');
            $departmentQuery->save();
            //CHECK IF STUDENTS ARE ENROLLED
            if ($students->count() > 0) {
                foreach ($students as $student) {
                    $student->department = $request->input('department_acronym');
                    $student->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Department was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $departments, $departmentID)
    {
        //
        try {

            $departments = $departments::find($departmentID);
            $departments->delete();
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        }

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
