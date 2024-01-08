<form action="{{ route('courses.update', $courseQuery->courseID) }}" method="POST" class="row g-3 mb-2"
    id="add_student_id_form" enctype="multipart/form-data" onload="onLoadBody">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="modal fade" id="addIdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="course_acronym">Course Acronym</label>
                            <input type="text" class="form-control @error('course_acronym') is-invalid @enderror"
                                name="course_acronym" id="course_acronym" value="{{ $courseQuery->course_acronym }}">
                            @error('course_acronym')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="course">Course</label>
                            <input type="text" class="form-control @error('course') is-invalid @enderror"
                                name="course" id="course" value="{{ $courseQuery->course }}">
                            @error('course_acronym')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="departmentID">Department</label>
                            <select class="form-control @error('departmentID') is-invalid @enderror" name="departmentID"
                                id="departmentID">

                                @foreach ($departments as $department)
                                    @if ($department->departmentID == $courseQuery->departmentID)
                                        <option value="{{ $department->departmentID }}" selected>
                                            {{ $department->department_acronym }}</option>
                                    @else
                                        <option value="{{ $department->departmentID }}">
                                            {{ $department->department_acronym }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('course_acronym')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Course</button>
                </div>
            </div>
        </div>
    </div>
</form>
