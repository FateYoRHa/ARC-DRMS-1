@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    {{-- <meta http-equiv="refresh" content="5"> --}}
    <div id="page-content-wrapper" class="">

        <a href="{{ route('registration.index') }}"
            class="list-group-item list-group-item-action bg-dark text-light">Register</a>
        <div class="container-fluid">
            <div class="page-content-title">
                <h2>Students</h2>
            </div>
            {{-- <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div> --}}
            <h5>Sort By</h5>
            <div class="row mb-4">
                <select class="form-control semester col-2" name="semester" id="semester" aria-labelledby="semester">
                    <option value="" selected="selected">Semester</option>
                    <option value="first">First Semester</option>
                    <option value="second">Second Semester</option>
                    <option value="summer">Summer</option>
                </select>

                <select name='year' id='year' class="form-control filter-year col-2">
                    <option value="" selected="selected">Year</option>
                    @foreach ($years as $year)
                        {{-- {{ $year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->date_begin)->format('Y.m.d') }} --}}
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                @if (Auth::user()->is_admin == 1)

                    <select data-column="7" class="form-control filter-select col-2">
                        <option value="" selected="selected">Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                @endif
                @if (Auth::user()->is_admin == 3)
                    <select data-column="6" class="form-control filter-select col-2">
                        <option value="" selected="selected">Course</option>
                        @foreach ($courseDept as $course)
                            <option value="{{ $course }}">{{ $course }}</option>
                        @endforeach
                    </select>
                @else
                    <select data-column="6" class="form-control filter-select col-2">
                        <option value="" selected="selected">Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course }}">{{ $course }}</option>
                        @endforeach
                    </select>
                @endif
                @if (Auth::user()->is_admin == 1)
                    <select data-column="8" class="form-control filter-select col-2">
                        <option value="" selected="selected">Entrance Status</option>
                        @foreach ($entrance_stat as $stat)
                            <option value="{{ $stat }}">
                                @if ($stat == 'returning_first_year')
                                    <p>Incoming First Year(Old Student)</p>
                                @elseif ($stat == 'incoming_first_year')
                                    <p>Incoming First Year</p>
                                @elseif ($stat == 'transferee')
                                    <p>Transferee</p>
                                @endif
                            </option>
                        @endforeach
                    </select>
                    <select data-column="9" class="form-control filter-select col-2">
                        <option value="" selected="selected">Status</option>
                        @foreach ($status as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                @else
                    <select data-column="9" class="form-control filter-select col-2">
                        <option value="" selected="selected">Status</option>
                        @foreach ($statusDept as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                @endif

            </div>
            <h5 id="gen">Generate Report</h5>
            <div class="table-responsive">
                <table class="table table-hover table-sm table-md datatable display compact" id="datatable">
                    <thead>

                        <tr>
                            <th hidden>Registration ID</th>
                            <th>Student ID</th>
                            <th class="col-sm-2">Name (Last, First Middle)</th>
                            <th hidden>Name</th>
                            <th hidden>Name</th>
                            <th hidden>Name</th>
                            <th class="col-sm-1">Course</th>
                            <th class="col-sm-1">Department</th>
                            <th class="col-sm-1">Entrance Status</th>
                            <th class="col-sm-1">Status</th>
                            <th class="col-sm-2">Last School Attended</th>
                            <th hidden>Last Year Attended</th>
                            <th class="col-sm-1">Registration Date</th>
                            <th class="col-sm-1">Updated At</th>
                            <th class="col-sm-2">Action</th>
                            <th hidden>Name/s</th>
                            {{-- <th hidden>year</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>Sky, Azure</td>
                            <td>BSBS</td>
                            <th>Transferee</th>
                            <td>Pending</td>
                        </tr> --}}
                        {{-- @foreach ($records as $tr)
                            <tr>
                                <td>{{ $tr->record_id }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>

            <!-- include script here for datatable entries -->
            @include('students.index_script')
        </div>
    </div>

    <!-- /#page-content-wrapper -->
@endsection
