<script type="text/javascript">
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autofill: true,
            deferRender: true,
            ajax: "{{ route('records.index') }}",
            columns: [{
                    data: 'record_id',
                    name: 'record Id',
                    searchable: false,
                    sortable: false,
                    visible: false
                },
                {
                    data: 'id_number',
                    name: 'id_number'
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: false,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'fName',
                    name: 'fName',
                    searchable: true,
                    sortable: true,
                    visible: false
                },
                {
                    data: 'mName',
                    name: 'mName',
                    searchable: true,
                    sortable: true,
                    visible: false
                },
                {
                    data: 'lName',
                    name: 'lName',
                    searchable: true,
                    sortable: true,
                    visible: false
                },
                {
                    data: 'course',
                    name: 'course',
                    searchable: true,
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
            scrollX: true,
            scrollY: '55vh',
            scrollCollapse: true,
            columnDefs: [{
                    targets: 0,
                    visible: true,
                    searchable: false
                }
            ],
            order: [
                [5, "asc"]
            ]

        });

    });

    //button delete
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
                        id: data_id,
                        success: function() {
                            location.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
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
