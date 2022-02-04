<?php

namespace App\Http\Controllers;

use App\Models\NewRecords;
use App\Http\Requests\StoreNewRecordsRequest;
use App\Http\Requests\UpdateNewRecordsRequest;

class NewRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('newrecords.index');
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
        //
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
        //
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
