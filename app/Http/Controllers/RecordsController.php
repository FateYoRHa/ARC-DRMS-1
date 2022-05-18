<?php

namespace App\Http\Controllers;

use App\Models\Records;
use App\Http\Requests\StoreRecordsRequest;
use App\Http\Requests\UpdateRecordsRequest;
use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RecordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            //datatable query for retrieving data rows in db
            if ($request->ajax()) {
                // $data = Records::latest()->get();
                $data = Records::query();
                return DataTables::of($data)
                    ->addColumn('name', function ($row) {
                        return $row->lName . ' , ' . $row->fName . ' ' . $row->mName;
                    })
                    ->addColumn('action', function ($row) {
                        $user = Auth::user();
                        if ($user->is_admin == 1) {
                            $actionBtn = ' <a href="/records/' . $row->record_id . '" class="edit btn btn-info btn-sm" title="View Record"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> Preview</a> 
                        <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm ml-3" data-id=" ' . $row->record_id . ' "><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> </button>';
                        } else if ($user->is_admin != 1) {
                            $actionBtn = ' <a href="/records/' . $row->record_id . '" class="edit btn btn-warning btn-sm" title="View Record"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/><path d="M19,3H5C3.89,3,3,3.9,3,5v14c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.11,3,19,3z M19,19H5V7h14V19z M12,10.5 c1.84,0,3.48,0.96,4.34,2.5c-0.86,1.54-2.5,2.5-4.34,2.5S8.52,14.54,7.66,13C8.52,11.46,10.16,10.5,12,10.5 M12,9 c-2.73,0-5.06,1.66-6,4c0.94,2.34,3.27,4,6,4s5.06-1.66,6-4C17.06,10.66,14.73,9,12,9L12,9z M12,14.5c-0.83,0-1.5-0.67-1.5-1.5 s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S12.83,14.5,12,14.5z"/></g></svg> Preview</a>';
                        } else {
                            $actionBtn = '';
                        }
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Error Retrieving Data');
        }
        
        return view('records.index');
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
     * @param  \App\Http\Requests\StoreRecordsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function show(Records $records, $record_id)
    {
        $recordQuery = Records::find($record_id);

        //join uploads table to show both record and files 
        $uploadQuery = DB::table('records')
            ->join('uploads', 'id_number', '=', 'uploads.student_id_record')
            ->get();

        return view('records.show', compact('uploadQuery'))->with('recordQuery', $recordQuery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function edit($record_id)
    {
        $recordQuery = Records::find($record_id);

        //Join uploads table to retrieve data
        $uploadQuery = DB::table('records')
            ->join('uploads', 'id_number', '=', 'uploads.student_id_record')
            ->get();

        return view('records.edit', compact('uploadQuery'))->with('recordQuery', $recordQuery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecordsRequest  $request
     * @param  \App\Models\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordsRequest $request, Records $records, $record_id)
    {
        $recordQuery = Records::find($record_id);
        try {
            //check if has upload file then puts in array in foreach
            if ($request->hasfile('files')) {
                foreach ($request->file('files') as $key => $file) {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();

                    $id_record = $request->input('id_number');
                    $for_record_id = $recordQuery->record_id;

                    $insert[$key]['student_id_record'] = $id_record;
                    $insert[$key]['filename'] = $name;
                    $insert[$key]['filepath'] = $path;
                    $insert[$key]['for_record_id'] = $for_record_id;
                }
                /**
                 * Validates file if has duplicate
                 * If true do not upload to db 
                 * Informs user that record was created
                 * Informs user that file was not uploaded
                 */
                $validateFile = Uploads::where('filename', $name)->first();
                if ($validateFile) {
                    alert()->warning('Record updated without file', 'Duplicate File Found');
                    return back();
                }
                //upsert update current record except unique filename
                DB::table('uploads')->upsert($insert, ['filename' => $name, 'filepath' => $path, 'student_id_record' => $id_record], ['filename' => $name], ['filepath']);
            }

            /** Check if has file then upload in dir of system */
            if ($request->hasfile('files')) {
                foreach ($request->file('files') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/uploads/', $name);
                    $data[] = $name;
                }
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        } finally {
            $recordQuery->id_number = $request->input('id_number');
            $recordQuery->fName = $request->input('inputFname');
            $recordQuery->mName = $request->input('inputMname');
            $recordQuery->lName = $request->input('inputLname');
            $recordQuery->course = $request->input('inputCourse');
            $recordQuery->save();
        }
        alert()->success('Success', 'Record and File Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function destroy(Records $records, $record_id)
    {
        $records_id = $record_id;
        try {
            $recordQuery = $records::find($records_id);
            $recordQuery->delete();

            //Join table uploads to delete data in uploads
            $uploadQuery = DB::table('uploads')
                ->leftJoin('records', 'student_id_record', 'records.id_number')
                ->where('for_record_id', $record_id);
            $uploadQuery->delete();
        } catch (\Exception $e) {
            alert()->error('Error', 'Something Went Wrong');
        }

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
