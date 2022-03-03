@extends('layouts.master')

@section('content')
<div id="page-content-wrapper">

    <div class="container-fluid">
        <div class="page-content-title">
            <h2>User List</h2>
        </div>
        <hr />

        <table class="table table-striped display datatable nowrap" id="datatable-record">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Name</th>
                    <th>Id Number</th>
                    <th>Password</th>
                    <th>Remember_token</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- include script here for datatable entries -->
        @include('users.index_script')
    </div>
</div>
@endsection