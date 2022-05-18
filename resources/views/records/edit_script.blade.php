<script>
    //Delete uploaded File Edit page
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#btnDelete', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    data_id = $(this).attr('data-id');
                    console.log(data_id);
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('uploads.index')}}" + '/' + data_id,
                        id: data_id,
                        success: function() {
                            location.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        error: function(data) {
                            console.log('Error', data);
                        }
                    });
                }
            })
        });
    });
    
    $(document).ready(function() {
        $('input[type="file"]').change(function(e) {
            var count = e.target.files.length;
            var fileName = [];
            let file = [];
            for (var i = 0; i < count; i++) {
                fileName += e.target.files[i].name + "<br>";
                console.log(fileName);
            }
            document.getElementById("selected-edit").innerHTML = "Selected files:" + "<br>" + fileName;
        })
    });
</script>