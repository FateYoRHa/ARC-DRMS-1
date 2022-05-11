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
            <p>Import files with the extension name(.xlsx) <a href="{{ asset('help-info/Help-Import.pptx.pdf') }}" target="_blank" title="Help/Tutorial"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="20px" fill="#0000EE">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92c-.5.51-.86.97-1.04 1.69-.08.32-.13.68-.13 1.14h-2v-.5c0-.46.08-.9.22-1.31.2-.58.53-1.1.95-1.52l1.24-1.26c.46-.44.68-1.1.55-1.8-.13-.72-.69-1.33-1.39-1.53-1.11-.31-2.14.32-2.47 1.27-.12.37-.43.65-.82.65h-.3C8.4 9 8 8.44 8.16 7.88c.43-1.47 1.68-2.59 3.23-2.83 1.52-.24 2.97.55 3.87 1.8 1.18 1.63.83 3.38-.19 4.4z" />
                    </svg></a></p>
            <form action="{{ route('file-import') }}" method="POST" id="formImport" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="customFile" required>
                        <small id="passwordHelpInline" class="text-muted">
                            Need help? Click the <span><svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="20px" fill="#0000EE">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92c-.5.51-.86.97-1.04 1.69-.08.32-.13.68-.13 1.14h-2v-.5c0-.46.08-.9.22-1.31.2-.58.53-1.1.95-1.52l1.24-1.26c.46-.44.68-1.1.55-1.8-.13-.72-.69-1.33-1.39-1.53-1.11-.31-2.14.32-2.47 1.27-.12.37-.43.65-.82.65h-.3C8.4 9 8 8.44 8.16 7.88c.43-1.47 1.68-2.59 3.23-2.83 1.52-.24 2.97.55 3.87 1.8 1.18 1.63.83 3.38-.19 4.4z" />
                                </svg></span>
                        </small>
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