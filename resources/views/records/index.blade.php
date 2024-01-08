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
                            <th class="col-sm-6">Name (Last, First Middle)</th>
                            <th hidden>Name</th>
                            <th hidden>Name</th>
                            <th hidden>Name</th>
                            <th class="col-sm-4">Course</th>
                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($records as $tr)
                            <tr>
                                <td>{{ $tr->record_id }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>

            <!-- include script here for datatable entries -->
            @include('records.index_script')
        </div>
    </div>

    <!-- /#page-content-wrapper -->
@endsection
