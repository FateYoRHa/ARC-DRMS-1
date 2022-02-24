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

        /** Check if has file then get filename as key and insert in db */
        // $validatedData = $request->validate([
        //     'files' => 'nullable',
        //     'files.*' => 'mimes:pdf'
        // ]);
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
                $student_id_record = $request->input('id_number');
                $insert[$key]['student_id_record'] = $student_id_record;
                $insert[$key]['filename'] = $name;
                $insert[$key]['filepath'] = $path;
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



        // $fileName = time() . '.'. $request->file->extension();  
        // $request->file->move(public_path('file'), $fileName);


        $recordQuery->save();

        return redirect('/newrecords')->with('success', 'Created successfully!');
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
