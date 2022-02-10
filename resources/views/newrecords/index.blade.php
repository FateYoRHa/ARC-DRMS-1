@extends('layouts.master')
@include('newrecords.index_script')
@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>
        <div class="page-content-title">
            <h2>New Record</h2>
        </div>
        <hr />
        @if ($errors->any())
        <div class="alert alert-danger" role='alert'>
            <ul>
                @foreach ($errors->all() as $error)
                <li class="error-message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('newrecords.store') }}" method="POST" class="row g-3" id="new-record-form">
            @csrf
            <div class="col-md-12">
                <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number <span class="material-icons-round material-icons-newrecord">badge</span></label>
                <input type="text" class="form-control form-control-sm" id="id_number" name="id_number">
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">First Name</label>
                <input type="text" class="form-control form-control-sm" id="inputFname" name="inputFname">
            </div>
            <div class="col-md-4">
                <label for="inputMname" class="form-label col-form-label-sm">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="inputMname" name="inputMname">
            </div>
            <div class="col-md-4">
                <label for="inputLname" class="form-label col-form-label-sm">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="inputLname" name="inputLname">
            </div>
            <div class="col-md-5">
                <label for="upload-file-new">Import File<span class="material-icons-outlined material-icons-newrecord">upload</span></label>
                <input type="file" class="form-control-file" id="upload-file-new" name="upload-file-new">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success new-record-submit">Submit</button>
            </div>
        </form>

    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection