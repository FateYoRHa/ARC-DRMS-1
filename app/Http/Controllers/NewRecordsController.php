<?php

namespace App\Http\Controllers;

use App\Models\NewRecords;
use App\Http\Requests\StoreNewRecordsRequest;
use App\Http\Requests\UpdateNewRecordsRequest;
use App\Models\Records;
use App\Models\Uploads;
use RealRashid\SweetAlert\Facades\Alert;



class NewRecordsController extends Controller
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
    public function index()
    {
        return view('newrecords.index');
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
     * @param  \App\Http\Requests\StoreNewRecordsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewRecordsRequest $request)
    {
        $recordQuery = new NewRecords();
        $recordQuery->id_number = $request->input('id_number');
        $recordQuery->fName = $request->input('inputFname');
        $recordQuery->mName = $request->input('inputMname');
        $recordQuery->lName = $request->input('inputLname');
        //save first to create record ID to be referenced in Upload tbl
        $recordQuery->save();

        //Upload file and get record ID to be stored in db for reference
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();

                $student_id_record = $request->input('id_number');
                $for_record_id = $recordQuery->record_id;

                $insert[$key]['student_id_record'] = $student_id_record;
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
                alert()->warning('Record created without file', 'Duplicate File Found');
                return back();

            }
            Uploads::insert($insert);
        }

        /** Check if has file then upload in dir of system */
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        alert()->success('Success','Created successfully!');
        return redirect('/newrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewRecords  $newRecords
     * @return \Illuminate\Http\Response
     */
    public function show(NewRecords $newRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewRecords  $newRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(NewRecords $newRecords)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewRecordsRequest  $request
     * @param  \App\Models\NewRecords  $newRecords
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewRecordsRequest $request, NewRecords $newRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewRecords  $newRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewRecords $newRecords)
    {
        //
    }
}
