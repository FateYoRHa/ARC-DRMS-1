<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#btnDelete', function() {
            data_id = $(this).attr('data-id');
            console.log(data_id);
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
                        url: "{{ route('records.index')}}" + '/' + data_id,

                        success: function() {
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
</script>