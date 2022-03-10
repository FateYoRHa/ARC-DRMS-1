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
            <p>Import files with the extension names(.xlsx, ..........., )</p>
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
                </div>
                <input type="button" class="btn btn-primary" onclick="importFunction()" value="Import Data">
                <!-- <a class="btn btn-success" href="{{ route('file-export') }}" onclick="exportFunction()">Export data</a> -->
            </form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection