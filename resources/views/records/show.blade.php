@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>
        <div class="page-content-title">
            <h2>Record</h2>
        </div>
        <hr />
        <div class="col-md-12">
            <label for="inputIdNumer" class="form-label col-form-label-sm">ID Number <span class="material-icons-round material-icons-newrecord">badge</span></label>
            <h4>
                {{$recordQuery->id_number}}
            </h4>
        </div>
        <div class="col-md-12">
            <label for="inputFname" class="form-label col-form-label-sm">Name</label>
            <h4>
                {{$recordQuery->student_name}}
            </h4>
        </div>
        <!-- Create other page for viewing the files -->
        <div class="col-md-12">
            <div class="row">
                @foreach ($uploadQuery as $file)
                @if($recordQuery->id_number == $file->student_id_record)
                <div class="col-md-6">
                    <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" width='500' height='400' allowfullscreen webkitallowfullscreen></iframe>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection