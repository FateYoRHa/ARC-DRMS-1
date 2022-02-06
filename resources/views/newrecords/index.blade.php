@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        <form class="row g-3">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label col-form-label-sm">ID Number</label>
                <input type="email" class="form-control form-control-sm" id="inputEmail4">
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label col-form-label-sm">First Name</label>
                <input type="text" class="form-control form-control-sm" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label col-form-label-sm">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="inputZip">
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label col-form-label-sm">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="inputZip">
            </div>
            <div class="col-md">
                    <label for="exampleFormControlFile1">Import File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Create New Record</button>
            </div>
        </form>
        <hr/>
        <div class="row">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Import File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection