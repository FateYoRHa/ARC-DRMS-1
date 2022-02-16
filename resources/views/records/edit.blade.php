@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>
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
        <form action="{{ url('records/'.$recordQuery->record_id) }}" method="PUT" class="row g-3" id="new-record-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control form-control-sm" id="record_id" name="record_id" value="{{$recordQuery->record_id}}" required hidden>
            <div class="col-md-12">
                <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number <span class="material-icons-round material-icons-newrecord">badge</span></label>
                <input type="text" class="form-control form-control-sm" id="id_number" name="id_number" value="{{$recordQuery->id_number}}" required>
            </div>
            <div class="col-md-12">
                <label for="inputFname" class="form-label col-form-label-sm">Name</label>
                <input type="text" class="form-control form-control-sm" id="student_name" name="student_name" value="{{$recordQuery->student_name}}" required>
            </div>

            <div class="col-md-4">
                <label for="upload-file-new">Import File<span class="material-icons-outlined material-icons-newrecord">upload</span></label>
                <input type="file" class="form-control-file" id="files" name="files[]" multiple>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-success new-record-submit" id="submit-new-record">Save</button>
            </div>
        </form>
        <!-- Create other page for viewing the files -->
        <div class="col-md-12">
            <div class="row">
                @foreach ($uploadQuery as $file)
                @if($recordQuery->id_number == $file->student_id_record)
                <div class="col-md-6">
                    <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" width='500' height='400' allowfullscreen webkitallowfullscreen ></iframe>
                </div>
                @endif
                @endforeach
            </div>
        </div>


    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection