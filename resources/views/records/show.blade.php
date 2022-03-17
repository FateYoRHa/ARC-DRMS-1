@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>Record</h2>
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

        <div class="primary-details row">
            <div class="col-md-2 profile-img">
                <img src="{{ asset('images/blank-profile.png') }}" alt="" class="profile-img">
            </div>
            <div class="col-md-10 row profile-details">
                <div class="col">
                    <div class=" edit-record-btn">
                        @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                        <a href="\records\{{$recordQuery->record_id}}\edit" class="edit-record btn btn-secondary py-0"><span class="material-icons-outlined material-icons">edit_note</span>Edit</a>
                        @else

                        @endif
                    </div>
                    <table class="table table-sm table-borderless" id="table-show-record">

                        <tbody>
                            <tr>
                                <td> <label for="idNumber" class="col-form-label-md primary-details-content">ID Number</label> </td>
                                <td> <label for="name" class="col-form-label-md primary-details-content">Name</label> </td>
                            </tr>
                            <tr>
                                <td> <p>{{$recordQuery->id_number}}</p> </td>
                                <td> <p>{{$recordQuery->fName}} {{$recordQuery->mName}} {{$recordQuery->lName}}</p> </td>
                            </tr>
                            
                            <tr>
                                <td> <label for="course" class="col-form-label-md primary-details-content">Course</label> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <p>{{$recordQuery->course}}</p> </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>

            </div>
        </div>

        <div class="page-content-title">
            <h2>Record Files</h2>
        </div>
        <hr />
        <!-- Create other page for viewing the files -->
        <div class="col-md-12">
            <div class="row">
                @foreach ($uploadQuery as $file)
                @if($recordQuery->id_number == $file->student_id_record)
                <div class="col-md-6">
                    <iframe src="/ViewerJS/#../uploads/{{$file->filename}}" id="iframe" width='500' height='400' allowfullscreen webkitallowfullscreen></iframe>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<script>
    var AuthUser = "{{{ (Auth::user()->is_admin) ? Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2 : 3 }}}";
    if (AuthUser == 3) {
        $('#iframe').ready(function() {
            setTimeout(function() {
                $('#iframe').contents().find('#download').remove();
            }, 100);
        });

    }
</script>
@endsection