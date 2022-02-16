<?php

namespace App\Http\Controllers;

use App\Models\Records;
use App\Http\Requests\StoreRecordsRequest;
use App\Http\Requests\UpdateRecordsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Records::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/records/' . $row->record_id . '/edit" class="edit btn btn-info btn-sm"><span class="material-icons-outlined material-icons">info</span></a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" hidden>Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
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
    public function show(Records $records)
    {
        //
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

        $uploadQuery = DB::table('records')
            ->join('uploads', 'id_number', '=', 'uploads.student_id_record')
            ->get();

        return view('records.edit', compact('recordQuery', 'uploadQuery'));
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
        $recordQuery->id_number = $request->input('id_number');
        $recordQuery->student_name = $request->input('student_name');

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
                $student_id_record = $request->input('id_number');
                $insert[$key]['student_id_record'] = $student_id_record;
                $insert[$key]['filename'] = $name;
                $insert[$key]['filepath'] = $path;
            }
        }
        $recordQuery->save();

        return redirect('/records')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function destroy(Records $records)
    {
        //
    }
}
