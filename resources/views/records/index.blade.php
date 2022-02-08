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

        <div class="record-search">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary btn-sm" type="button" id="button-addon2">Search</button>
            </div>
        </div>

        <div class="table-responsive-sm">
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
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection