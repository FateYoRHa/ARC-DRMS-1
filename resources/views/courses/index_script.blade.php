<script>
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            'processing': true,
            'serverSide': true,
            'responsive': true,
            'autofill': true,
            'deferRender': true,
            'ajax': "{{ route('courses.index') }}",
            'columns': [
                {
                    'data': 'courseID',
                    name: 'courseID',
                    // searchable: false,
                    // sortable: false,
                    'visible': false
                },
                {
                    'data': 'course_acronym',
                    name: 'course_acronym',
                    // searchable: false,
                    // sortable: false,
                    // visible: true
                },
                {
                    data: 'course',
                    name: 'course',
                    // searchable: true,
                    // sortable: true,
                    // visible: true
                },
                {
                    data: 'department',
                    name: 'departmentID',
                    // searchable: true,
                    // sortable: false,
                    // visible: true
                },
                {
                    name: 'created_at',
                    data: 'created_at',
                    // data: { '_': 'display', 'sort': 'timestamp'},
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                    // visible:false
                },
                {
                    name: 'updated_at',
                    data: 'updated_at',
                    // data: { '_': 'display', 'sort': 'timestamp'},
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                    // visible:false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],

            // 'order' : [[10, 'DESC']],
            scrollX: false,
            scrollY: '55vh',
            scrollCollapse: true,
            columnDefs: [{
                targets: 0,
                visible: true,
                searchable: false
            }],
            order: [
                [6, "desc"]
            ]

        });
        $('.filter-select').change(function() {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });
        // setInterval(function() {
        //     table.ajax.reload(null, false); // user paging is not reset on reload
        // }, 5000);
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
            count = $(this).attr('student-count');
            if(count > 0){
                message = "There are " + count + " student/s currently enrolled in this course and you won't be able to revert this!"
            }
            else{
                message = "You won't be able to revert this!"
            }
            console.log(data_id);
            Swal.fire({
                title: 'Are you sure?',
                text: message,
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
                        url: "{{ route('courses.index') }}" + '/' + data_id,
                        id: data_id,
                        success: function() {
                            location.reload();
                            Swal.fire(
                                'Deleted!',
                                'Course has been deleted.',
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
