 <!-- Modal -->
 {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
     integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
 </script> --}}


 <form action="{{ route('add-student-id', $studentQuery->registration_id,'addStudentId') }}" method="POST"
     class="row g-3 mb-2" id="add_student_id_form" enctype="multipart/form-data" onload="onLoadBody">
     {{ csrf_field() }}
     {{-- {{ method_field('POST') }} --}}
     <div class="modal fade" id="addIdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Student ID</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body">
                     <div class="row">
                         <input type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" id="student_id">
                         @error('student_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary">Add Student ID</button>
                 </div>
             </div>
         </div>
     </div>
 </form>
