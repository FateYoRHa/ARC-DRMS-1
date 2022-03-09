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
                        return $row->fName . ' ' . $row->mName . ' ' . $row->lName;
                    })
                    ->addColumn('action', function ($row) {
                        $user = Auth::user();
                        if ($user->is_admin == 1) {
                            $actionBtn = ' <a href="/records/' . $row->record_id . '" class="edit btn btn-warning btn-sm" title="View Record"><span class="material-icons-outlined material-icons">preview</span> Preview</a> 
                        <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id=" ' . $row->record_id . ' "><span class="material-icons-outlined material-icons">delete</span> Delete</button>';
                        } else if ($user->is_admin != 1) {
                            $actionBtn = ' <a href="/records/' . $row->record_id . '" class="edit btn btn-warning btn-sm" title="View Record"><span class="material-icons-outlined material-icons">preview</span> Preview</a>';
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
