<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Http\Requests\StoreImportRequest;
use App\Http\Requests\UpdateImportRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportFile;
use App\Exports\FileExport;
use App\Models\Records;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ImportController extends Controller
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
        return view('import.index');
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
     * @param  \App\Http\Requests\StoreImportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImportRequest  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImportRequest $request, Import $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(StoreImportRequest $request)
    {
        Excel::import(new ImportFile, $request->file('file')->store('temp'));
        return back();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        //Check if records exist if not return no records found.
        if (Records::exists()) {
            return Excel::download(new FileExport, 'records-collection.xlsx');
        } else {
            alert()->error('No Records Found','0 Records Found');
            return back();
        }
    }
}
