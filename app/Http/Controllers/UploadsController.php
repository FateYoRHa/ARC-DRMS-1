<?php

namespace App\Http\Controllers;

use App\Models\Uploads;
use App\Http\Requests\StoreUploadsRequest;
use App\Http\Requests\UpdateUploadsRequest;
use Illuminate\Support\Facades\Request;

class UploadsController extends Controller
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
        //
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
     * @param  \App\Http\Requests\StoreUploadsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUploadsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uploads  $uploads
     * @return \Illuminate\Http\Response
     */
    public function show(Uploads $uploads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uploads  $uploads
     * @return \Illuminate\Http\Response
     */
    public function edit(Uploads $uploads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUploadsRequest  $request
     * @param  \App\Models\Uploads  $uploads
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUploadsRequest $request, Uploads $uploads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uploads  $uploads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uploads $uploads, Request $request, $upload_id)
    {
        $uploads_id = $upload_id;
        $uploadsQuery = $uploads::find($uploads_id);
        $uploadsQuery->delete();

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
