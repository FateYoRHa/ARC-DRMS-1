@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>Records</h2>
        </div>
        <hr />
        <div class="">
            <table class="table table-striped datatable responsive" id="datatable-record">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <!-- include script here for datatable entries -->
        @include('records.index_script')
    </div>
</div>

<!-- /#page-content-wrapper -->
@endsection