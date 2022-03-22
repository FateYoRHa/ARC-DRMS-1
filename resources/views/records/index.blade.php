@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2> Records</h2>
        </div>
        <hr />
        <div class="table-responsive">
            <table class="table table-hover table-sm table-md datatable display compact" id="datatable-record">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Student ID</th>
                        <th class="col-sm-4">Name (Last, First Middle)</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th class="col-sm-4">Course</th>
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