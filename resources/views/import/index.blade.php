@extends('layouts.master')

@section('content')

@include('import.index_script')
<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>Import</h2>
        </div>
        <hr />
        <div class="import-content">
            <p>Import files with the extension names(.xlsx, ..........., ) <a href="{{ asset('help-info/Help-Import.pdf') }}" target="_blank"><span class="material-icons-round material-icons help-import">help</span></a></p>
            <form action="{{ route('file-import') }}" method="POST" id="formImport" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="customFile" required>

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="progress mt-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" role="progressbar">
                            <div id="spinner"></div>
                        </div>
                    </div>
                </div>
                <input type="button" class="btn btn-success importDataBtn" onclick="importFunction()" value="Upload" id="submit-import">
                <!-- <a class="btn btn-success" href="{{ route('file-export') }}" onclick="exportFunction()">Export data</a> -->
            </form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection