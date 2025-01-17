@extends('layouts.master')
@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>New Record</h2>
        </div>
        <hr />
        @if ($errors->any())
        <div class="alert alert-secondary fade show" role="alert" id="error-alert">

            @foreach ($errors->all() as $error)
            <span class="material-icons-round material-icons">
                error_outline
            </span> {{ $error }}
            @endforeach
        </div>
        @endif

        <form action="{{ route('newrecords.store') }}" method="POST" class="row g-3" id="new-record-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-12">
                <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number</label>
                <input type="number" class="form-control form-control-sm" id="id_number" name="id_number" value="{{ old('id_number') }}" required>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">First Name</label>
                <input type="text" class="form-control form-control-sm" id="inputFname" name="inputFname" value="{{ old('inputFname') }}" required>
            </div>
            <div class="col-md-4">
                <label for="inputMname" class="form-label col-form-label-sm">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="inputMname" name="inputMname" value="{{ old('inputMname') }}">
            </div>
            <div class="col-md-4">
                <label for="inputLname" class="form-label col-form-label-sm">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="inputLname" name="inputLname" value="{{ old('inputLname') }}" required>
            </div>
            <div class="col-md-12">
                <label for="inputLname" class="form-label col-form-label-sm">Course</label>
                <input type="text" class="form-control form-control-sm" id="inputCourse" name="inputCourse" value="{{ old('inputCourse') }}" required>
            </div>
            <div class="col-md-4">
                <label for="upload-file-new" class="upload-file-new">Import File</label>
                <input type="file" class="form-control-file" id="files" name="files[]" multiple>
                <small class="text-muted">Select multiple files in one folder if uploading multiple files</small>
            </div>
            <pre id="selected"></pre>

            <div class="col-12">
                <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Submit</button>
            </div>
        </form>

    </div>
</div>
<!-- /#page-content-wrapper -->

@include('newrecords.index_script')
@endsection