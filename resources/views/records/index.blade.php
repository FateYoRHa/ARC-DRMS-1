@extends('layouts.master')


@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="sidebar-button">
            <button class="btn btn-outline" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
        </div>

        <div class="page-content-title">
            <h2>Records</h2>
        </div>
        <hr />

        <table class="table table-striped display datatable nowrap" id="datatable-record">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Id Number</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- include script here for datatable entries -->
        @include('records.index_script') 
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
