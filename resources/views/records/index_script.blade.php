<script type="text/javascript">
    $(document).ready( function() {

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autofill:true,
            ajax: "{{ route('records.index') }}",
            columns: [{
                    data: 'record_id',
                    name: 'record Id'
                },
                {
                    data: 'id_number',
                    name: 'id_number'
                },
                {
                    data: 'student_name',
                    name: 'student_name'
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
            scrollY: '55vh',
            scrollX: true,
            scrollCollapse: true,
            columnDefs: [{
                    targets: 0,
                    visible: true,
                    searchable: false
                }
            ],
            fixedColumns: true
        });

    });

    /** Button Show Script */
    
    $('body').on('click', '#btnShow', function(){
            $('#editModal').modal('show');
            $('#modalTitle').html("Show");

            data_id = $(this).attr('data-id');

            $.get("{{ route('records.index') }}" + '/' + data_id, function(data){ //gets the fields of data using the id 
                console.log(data);
                $('#id_number').val(data.id_number);
                $('#name').val(data.name);
                // $('#lastName').val(data.lastName);
                // $('#firstName').val(data.firstName);
                // $('#email').val(data.email);
                // $('#is_admin').val(data.is_admin);
            });
        });
</script>