<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autofill:true,
            ajax: "{{ route('records.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id_number',
                    name: 'id_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'file_path',
                    name: 'file_path'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
            scrollY: '50vh',
            scrollX: true,
            scrollCollapse: true,
            columnDefs: [{
                    targets: 0,
                    visible: false,
                    searchable: false
                }
            ],
            fixedColumns: true
        });

    });
</script>