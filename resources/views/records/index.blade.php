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
        <table class="table table-striped display yajra-datatable nowrap" id="datatable-record">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Id Number</th>
                    <th>Name</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- include script here for datatable entries -->
        @include('records.index_script') 
  

        <!-- <div class="table-responsive-sm">
            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">File</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2000XXXX</td>
                        <td>Jane Does Doe</td>
                        <td>
                            <span class="material-icons-round">
                                folder
                            </span>
                        </td>
                        <td>
                            <span class="material-icons-round">
                                edit
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>2000XXXX</td>
                        <td>Thorton John</td>
                        <td>
                            <span class="material-icons-round">
                                folder
                            </span>
                        </td>
                        <td>
                            <span class="material-icons-round">
                                edit
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>2000XXXX</td>
                        <td>Mary Jane Does Doe</td>
                        <td>
                            <span class="material-icons-round">
                                folder
                            </span>
                        </td>
                        <td>
                            <span class="material-icons-round">
                                edit
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection