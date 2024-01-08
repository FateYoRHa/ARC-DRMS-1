<form action="{{ route('departments.update', $departmentQuery->departmentID) }}" method="POST" class="row g-3 mb-2"
    id="add_student_id_form" enctype="multipart/form-data" onload="onLoadBody">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="modal fade" id="addIdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="department_acronym">Department Acronym</label>
                            <input type="text" class="form-control @error('department_acronym') is-invalid @enderror"
                                name="department_acronym" id="department_acronym"
                                value="{{ old('department_acronym') }}">
                            @error('department_acronym')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid mt-3 @enderror"
                                name="department" id="department" value="{{ old('department') }}">
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Department</button>
                </div>
            </div>
        </div>
    </div>
</form>
