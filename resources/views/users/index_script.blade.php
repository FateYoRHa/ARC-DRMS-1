<script type="text/javascript">
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autofill: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'user_id',
                    name: 'record Id',
                    searchable: false,
                    sortable: false,
                    visible: false
                },
                {
                    data: 'username',
                    name: 'username',
                    searchable: true,
                    sortable: true,
                    visible: true
                },
                {
                    data: 'idNumber',
                    name: 'idNumber'
                },
                {
                    data: 'password',
                    name: 'password',
                    searchable: false,
                    visible: false
                },
                {
                    data: 'remember_token',
                    name: 'remember_token',
                    searchable: false,
                    visible: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    sortable: true,
                    visible: true
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                    searchable: false,
                    sortable: true,
                    visible: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            scrollY: '55vh',
            scrollX: true,
            columnDefs: [{
                    targets: 0,
                    visible: true,
                    searchable: false
                },
                {
                    defaultContent: "-",
                    targets: "_all",
                }
            ],


        });

    });

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
                        url: "{{ route('users.index')}}" + '/' + data_id,
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
</script>