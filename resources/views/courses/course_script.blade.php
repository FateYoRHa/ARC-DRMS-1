<script>
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            'processing': true,
            'serverSide': true,
            'responsive': true,
            'autofill': true,
            'deferRender': true,
            'ajax': "{{ route('courses.show', $courseID)}}",
            'columns': [
                {
                    'data': 'registration_id',
                    'name': 'registration_id',
                    // searchable: false,
                    // sortable: false,
                    'visible': false
                },
                {
                    'data': 'student_id',
                    'name': 'student_id',
                    // searchable: false,
                    // sortable: false,
                    'visible': true
                },
                {
                    'data': 'name',
                    // 'name': 'name',
                },
                {
                    'data': 'fname',
                    'name': 'name',
                    // searchable: true,
                    // sortable: true,
                    'visible': false
                },
                {
                    'data': 'lname',
                    'name': 'name',
                    // searchable: true,
                    // sortable: true,
                    'visible': false
                },
                {
                    'data': 'mname',
                    'name': 'name',
                    // searchable: true,
                    // sortable: true,
                    'visible': false
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
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 5000);
    });
</script>
