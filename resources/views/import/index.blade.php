@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>
        <div class="page-content-title">
            <h2>Import</h2>
        </div>
        <hr />
        <div class="import-content">
            <p>Import files with the extension names(.xlsx, ......, )</p>
            <!-- <div class="col-md">
                <label for="exampleFormControlFile1">Import File <span class="material-icons-outlined material-icons-newrecord">upload</span></label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div> -->
            <div class="input-group">
                <input type="file" class="form-control" id="inputGroupFile02">
                <button class="btn btn-outline-secondary" type="button">Upload</button>
            </div>
        </div>



    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection