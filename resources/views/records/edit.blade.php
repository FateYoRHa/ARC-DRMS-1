@extends('layouts.master')
@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>Edit Record</h2>
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

        @if(Auth::user()->is_admin == 1)
        <form action="{{ route('records.update', ['record' => $recordQuery->record_id]) }}" method="POST" class="row g-3 mb-2" id="new-record-form" enctype="multipart/form-data" onload="onLoadBody">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="text" class="form-control form-control-sm" id="record_id InputEdit" name="record_id" value="{{$recordQuery->record_id}}" required hidden>
            <div class="col-md-12">
                <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number <span class="material-icons-round material-icons-newrecord">badge</span></label>
                <input type="text" class="form-control form-control-sm" id="id_number InputEdit" name="id_number" value="{{$recordQuery->id_number}}" required>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">First Name</label>
                <input type="text" class="form-control form-control-sm" id="inputFname InputEdit" name="inputFname" value="{{$recordQuery->fName}}" required>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="inputMname InputEdit" name="inputMname" value="{{$recordQuery->mName}}" required>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="inputLname InputEdit" name="inputLname" value="{{$recordQuery->lName}}" required>
            </div>
            <div class="col-md-12">
                <label for="inputCourse" class="form-label col-form-label-sm">Course</label>
                <input type="text" class="form-control form-control-sm" id="inputCourse InputEdit" name="inputCourse" value="{{$recordQuery->lName}}" required>
            </div>
            <div class="col-md-4">
                <label for="upload-file-new" class="upload-file-new">Import File</label>
                <input type="file" class="form-control-file" id="files" name="files[]" multiple>
            </div>
            <pre id="selected-edit"></pre>
            <div class="col-12">
                <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Save</button>
            </div>
        </form>
        @else
        <form action="{{ route('records.update', ['record' => $recordQuery->record_id]) }}" method="POST" class="row g-3 mb-2" id="new-record-form" enctype="multipart/form-data" onload="onLoadBody">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="text" class="form-control form-control-sm" id="record_id InputEdit" name="record_id" value="{{$recordQuery->record_id}}" required hidden readonly>
            <div class="col-md-12">
                <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number <span class="material-icons-round material-icons-newrecord">badge</span></label>
                <input type="text" class="form-control form-control-sm" id="id_number InputEdit" name="id_number" value="{{$recordQuery->id_number}}" required readonly>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">First Name</label>
                <input type="text" class="form-control form-control-sm" id="inputFname InputEdit" name="inputFname" value="{{$recordQuery->fName}}" required readonly>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">Middle Name</label>
                <input type="text" class="form-control form-control-sm" id="inputMname InputEdit" name="inputMname" value="{{$recordQuery->mName}}" required readonly>
            </div>
            <div class="col-md-4">
                <label for="inputFname" class="form-label col-form-label-sm">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="inputLname InputEdit" name="inputLname" value="{{$recordQuery->lName}}" required readonly>
            </div>
            <div class="col-md-12">
                <label for="inputLname" class="form-label col-form-label-sm">Course</label>
                <input type="text" class="form-control form-control-sm" id="inputCourse InputEdit" name="inputCourse" value="{{$recordQuery->lName}}" required readonly>
            </div>
            <div class="col-md-4">
                <label for="upload-file-new" class="upload-file-new">Import File</label>
                <input type="file" class="form-control-file" id="files" name="files[]" multiple>
            </div>
            <pre id="selected-edit"></pre>
            <div class="col-12">
                <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Save</button>
            </div>
        </form>
        @endif
        <div class="page-content-title">
            <h4>Files</h4>
        </div>
        <hr />
        <div class="col-6">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Filename</th>
                        <th scope="col">Action</th>
                    </tr>
                <tbody>
                    @foreach ($uploadQuery as $file)
                    <tr>
                        @if($recordQuery->id_number == $file->student_id_record)
                        <td>
                            <a href='{{ secure_asset("uploads/{$file->filename}") }}' target="_blank">{{$file->filename}}</a>
                        </td>
                        <td>
                            <button type="button" id="btnDelete" class="btn btn-outline-danger btn-sm py-0 px-1" data-id="{{$file->upload_id}}"><span class="material-icons-outlined material-icons">delete</span></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@include('records.edit_script')
@endsection
