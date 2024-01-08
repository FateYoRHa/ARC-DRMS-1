<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>

<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
</script>
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js">
</script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
</script>
{{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
<script src="/vendor/datatables/buttons.server-side.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        start_date = '';
        end_date = '';
        year = '';
        if ('{{ Auth::user()->is_admin }}' == 1) {
            buttons =
                "<'row'<'col-sm-6'B>> <'row'<'col-sm-6'l><'col-sm-6'f>> <'row'<'col-sm-12'tr>> <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";
        } else {
            document.getElementById('gen').style.display = 'none';
            buttons =
                "<'row'<'col-sm-6'l><'col-sm-6'f>> <'row'<'col-sm-12'tr>> <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";
        }
        var table = $('.datatable').DataTable({
            'processing': true,
            'serverSide': true,
            'responsive': true,
            'autofill': true,
            'deferRender': true,
            dom: buttons,
            // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            // ,
            buttons: [{
                    extend: 'pdfHtml5',
                    pageSize: 'A4',
                    download: 'open',
                    duplicate: true,
                    messageTop: null,
                    // messageTop: table_count,
                    // recordsFiltered: '',
                    customize: function(doc) {

                        doc.styles.tableHeader.fontSize = 10;
                        doc.styles.title.fontSize = 0;
                        // Remove spaces around page title
                        doc.content[0].text = doc.content[0].text.trim();
                        doc.content[1].table.body[0].forEach(function(h) {
                            h.fillColor = 'red';
                        });
                        // doc['header'] = (function(page, pages) {
                        //     return {
                        //         columns: [{
                        //             margin: [10,0],
                        //             alignment: 'center',
                        //             text:'HEADER',
                        //         }],

                        //     }
                        // });
                        doc.content.splice(1, 0, {
                            margin: [0, 0, 0, 12],
                            alignment: 'center',
                            image: '<?php echo $src1; ?>',
                            width: 525,
                            height: 60,
                            margin: [-100, 0, 0, 100]
                        });
                        // doc.content.splice(1, 0, {
                        //     margin: [0, 0, 0, 12],
                        //     alignment: 'center',
                        //     render: "{{ route('pdfHeader') }}",
                        //     width: 150,
                        //     height: 150
                        // });
                        doc.content.push({
                            margin: [0, 12, 0, 12],
                            alignment: 'right',
                            text: 'A total of ' + table.data().count() +
                                " student/s registered",
                            fontSize: 15
                        });
                        doc['footer'] = (function(page, pages) {
                            return {
                                columns: [,
                                    {
                                        // This is the right column
                                        alignment: 'right',
                                        text: ['page ', {
                                            text: page.toString()
                                        }, ' of ', {
                                            text: pages.toString()
                                        }]
                                    }
                                ],
                                margin: [10, 0]
                            }
                        });
                        var objLayout = {};
                        // Horizontal line thickness
                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };
                        // Vertikal line thickness
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        // Horizontal line color
                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };
                        // Vertical line color
                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };
                        // Left padding of the cell
                        objLayout['paddingLeft'] = function(i) {
                            return 4;
                        };
                        // Right padding of the cell
                        objLayout['paddingRight'] = function(i) {
                            return 4;
                        };
                        // Inject the object in the document
                        doc.content[1].layout = objLayout;
                    },

                    exportOptions: {
                        modifier: {
                            page: 'current'
                        },
                        columns: [1, 2, 6, 7, 8, 9, 12]
                    },
                },
                {
                    text: 'CSV',
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [1, 2, 6, 7, 8, 9, 10, 12]
                    },
                },
                {
                    text: 'EXCEL',
                    extend: 'excelHtml5',
                    download: 'open',
                    exportOptions: {
                        columns: [1, 2, 6, 7, 8, 9, 10, 12]
                    },
                },
                {
                    text: 'PRINT',
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 6, 7, 8, 9, 10, 12]
                    },
                },
                {
                    extend: 'pdfHtml5',
                    pageSize: 'A4',
                    text: 'OTR',
                    download: 'open',
                    duplicate: true,
                    messageTop: null,

                    // messageTop: table_count,
                    // recordsFiltered: '',
                    customize: function(doc) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0]
                            .length + 1).join('*').split('');
                        doc.styles.tableHeader.fontSize = 10;
                        doc.styles.title.fontSize = 0;
                        doc.content[1].table.body[0].forEach(function(h) {
                            h.fillColor = 'red';
                        });
                        // doc.content[1].table.body[0].tableHeader = 'NAME/S';
                        // doc.content[1].table.body[1].text = 'LAST YEAR ATTENDED';

                        var rowCount = doc.content[1].table.body.length;
                        for (i = 1; i < rowCount; i++) {

                            /*var val = document.form1.campo.value;
                            if (isNaN(val)){
                                alert(‘Il valore inserito non è numerico’);
                            } else {
                                alert(‘Il valore inserito è numerico’);
                            }*/
                            doc.content[1].table.body[i][0].alignment = 'center';
                            doc.content[1].table.body[i][1].alignment = 'center';
                        }
                        // Remove spaces around page title
                        // doc.content[0].text = doc.content[0].text.trim();
                        // doc['header'] = (function(page, pages) {
                        //     return {
                        //         columns: [{
                        //             margin: [10,0],
                        //             alignment: 'center',
                        //             text:'HEADER',
                        //         }],

                        //     }
                        // });
                        doc.content.splice(1, 0, {
                            margin: [0, 0, 0, 0],
                            alignment: 'center',
                            image: '<?php echo $src; ?>',
                            width: 525,
                            height: 60,
                            margin: [-100, 0, 0, 20]
                        });
                        doc.content.splice(2, 0, {
                            margin: [0, 10, 0, 10],
                            alignment: 'right',
                            text: '_____________________________',
                            fontSize: 12
                        });
                        doc.content.splice(3, 0, {
                            margin: [0, 5, 0, 10],
                            alignment: 'left',
                            text: 'The Registrar',
                            fontSize: 10
                        });
                        doc.content.splice(4, 0, {
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '_____________________________',
                            fontSize: 12
                        });
                        doc.content.splice(5, 0, {
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '_____________________________',
                            fontSize: 12
                        });

                        doc.content.splice(6, 0, {
                            margin: [0, 10, 0, 10],
                            alignment: 'left',
                            text: 'Sir / Madam:           ',
                            fontSize: 9
                        });
                        doc.content.splice(7, 0, {
                            margin: [20, 10, 0, 10],
                            alignment: 'left',
                            text: 'Please furnish us original copies of TRANSCRIPT OF RECORDS (OTR) of the following student/s who is/ are temporarily',
                            fontSize: 9
                        });
                        doc.content.splice(8, 0, {
                            margin: [0, 5, 0, 10],
                            alignment: 'left',
                            text: 'enrolled in the UNIVERSITY OF BAGUIO:',
                            fontSize: 9
                        });
                        doc.content.push({
                            margin: [0, 20, 0, 10],
                            alignment: 'left',
                            text: '    Thank you.',
                            fontSize: 8
                        });

                        doc.content.push({
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '_______ 1st Request',
                            fontSize: 8
                        });

                        doc.content.push({
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '_______ 2nd Request',
                            fontSize: 8
                        });
                        doc.content.push({
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '_______ 3rd Request',
                            fontSize: 8
                        });

                        doc.content.push({
                            margin: [0, 0, 0, 10],
                            alignment: 'left',
                            text: '______  PLEASE ENTRUST TO THE BEARER IN A SEALED ENVELOPE',
                            fontSize: 10
                        });
                        doc.content.push({
                            margin: [0, 20, 80, 30],
                            alignment: 'right',
                            text: 'Very truly yours,',
                            fontSize: 10
                        });
                        doc.content.push({
                            margin: [0, 0, 0, 5],
                            alignment: 'right',
                            text: 'MEDARDO F. ABARIENTOS, MACT',
                            fontSize: 10
                        });
                        doc.content.push({
                            margin: [0, 0, 50, 10],
                            alignment: 'right',
                            text: 'Registrar',
                            fontSize: 10
                        });
                        doc['footer'] = (function(page, pages) {
                            return {
                                columns: [{
                                        // This is the right column
                                        alignment: 'left',
                                        text: ['NOTE: Please indicate issued for University of Baguio.                         ',
                                            '               PLEASE ENTRUST IT TO THE BEARER THE REQUESTED DOCUMENT                       IN A SEALED ENVELOPE SIGNED ',
                                            'ACROSS THE FLAP BY THE REGISTRAR. THANK YOU VERY MUCH.'
                                        ],
                                        fontSize: 8,
                                        bold: true,
                                    },
                                    {
                                        // This is the right column
                                        alignment: 'right',
                                        text: ['page ', {
                                            text: page.toString()
                                        }, ' of ', {
                                            text: pages.toString()
                                        }]
                                    }
                                ],
                                margin: [10, 0]
                            }
                        });

                        // doc.content[1].table.widths = ['50%', '50%'];
                        var objLayout = {};
                        // Horizontal line thickness
                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };
                        // Vertikal line thickness
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        // Horizontal line color
                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };
                        // Vertical line color
                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };
                        // Left padding of the cell
                        objLayout['paddingLeft'] = function(i) {
                            return 4;
                        };
                        // Right padding of the cell
                        objLayout['paddingRight'] = function(i) {
                            return 4;
                        };
                        // Inject the object in the document
                        doc.content[1].layout = objLayout;
                    },

                    exportOptions: {
                        modifier: {
                            page: 'current'
                        },
                        columns: [15, 11],
                        // alignment: 'center',
                    },
                },
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            'ajax': {
                url: "{{ route('students.index') }}",
                data: function(d) {
                    d.start_date = start_date;
                    d.end_date = end_date;
                    d.year = year;
                    // console.log(year);
                }
            },
            'columns': [{
                    'data': 'registration_id',
                    // name: 'registration_id',
                    // searchable: false,
                    // sortable: false,
                    'visible': false
                },
                {
                    'data': 'student_id',
                    // name: 'student_id',
                    // searchable: false,
                    // sortable: false,
                    // visible: true
                },
                {
                    'data': 'name',
                    name: 'name',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    'data': 'fname',
                    // name: 'fname',
                    // searchable: true,
                    // sortable: true,
                    'visible': false
                },
                {
                    'data': 'mname',
                    // name: 'mname',
                    // searchable: true,
                    // sortable: true,
                    'visible': false
                },
                {
                    'data': 'lname',
                    // name: 'lname',
                    // searchable: true,
                    // sortable: true,
                    visible: false
                },
                {
                    data: 'course',
                    // name: 'course',
                    // searchable: true,
                    sortable: false,
                    // visible: true
                },
                {
                    data: 'department',
                    name: 'department',
                    // searchable: true,
                    sortable: false,
                    // visible: true
                },
                {
                    data: 'entrance_status',
                    // name: 'entrance_status',
                    // searchable: true,
                    sortable: false,
                    // visible: true,
                    mRender: function(data) {
                        if (data == 'returning_first_year') {
                            return '<p>Incoming First Year(Old Student)</p>';
                        } else if (data == 'incoming_first_year') {
                            return '<p>Incoming First Year</p>';
                        } else if (data == 'transferee') {
                            return '<p>Transferee</p>';
                        }
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    // searchable: true,
                    sortable: false,
                    // visible: true,
                    mRender: function(data) //COLOR FOR EACH STATUS
                    {
                        if (data == 'pending') {
                            return '<span class="badge badge-warning"> pending </span>';
                        } else if (data == 'for approval') {
                            return '<span class="badge badge-primary"> for approval </span>';
                        } else if (data == 'for id') {
                            return '<span class="badge badge-secondary"> for id </span>';
                        } else if (data == 'for encoding/enrollment') {
                            return '<span class="badge badge-info"> for encoding/enrollment </span>';
                        } else if (data == 'registered') {
                            return '<span class="badge badge-success"> registered </span>';
                        } else if (data == 'dropped') {
                            return '<span class="badge badge-danger"> dropped </span>';
                        }
                    }
                },
                {
                    name: 'school',
                    data: 'school',
                    // visible: true,
                    // searchable: true
                },
                {
                    // LAST YEAR ATTENDED
                    name: 'date',
                    data: 'date',
                    visible: false,
                    searchable: false
                },

                {
                    data: 'date_registered',
                    name: 'date_registered',
                    orderable: false,
                    // visible: false,
                    searchable: true

                },
                {
                    name: 'updated_at',
                    data: 'updated_at',
                    // orderable: true,
                    searchable: false,
                    // data: { '_': 'display', 'sort': 'timestamp'},
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                    // visible:false
                    // searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    // searchable: false
                },
                {
                    data: 'names',
                    name: 'names',
                    orderable: false,
                    visible: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    },
                    orderable: false,
                    visible: false,
                    searchable: true
                },
            ],


            // 'order' : [[10, 'DESC']],
            scrollX: true,
            scrollY: '55vh',
            scrollCollapse: false,
            columnDefs: [{
                targets: 0,
                visible: true,
                searchable: false
            }],
            order: [
                [13, "desc"]
            ]

        });
        $('.filter-select').change(function() {
            // year = $('#year').val();
            // console.log(year);
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();

        });
        // $('.filter-year').change(function() {
        //     year = $(this).val();
        //     // console.log(year);
        //     table.column(12)
        //         .search($(this).val())
        //         .draw();

        // });
        $('.filter-year').on('change', function() {
                var year = $(this).val();
                table.column(12).search(year).draw();
            });
        $('.semester').change(function(e) {
            if ($('#semester').val() == '') {
                start_date = '';
                end_date = '';
            } else if ($('#semester').val() == 'first') {
                // start_date = $('#year').val().concat('-08-01');
                // end_date = $('#year').val().concat('-12-31');
                start_date = '08';
                end_date = '12';
                // year = $('#year').val();

                console.log(year);
            } else if ($('#semester').val() == 'second') {
                start_date = '01';
                end_date = '05';
                // year = $('#year').val();
            } else if ($('#semester').val() == 'summer') {
                start_date = '06';
                end_date = '07';
                // year = $('#year').val();
            }
            e.preventDefault();
            table.draw();
        });
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 30000);
        table_count = table.data().count();
    });
    // setInterval( function () {
    // table.ajax.reload( null, false ); // user paging is not reset on reload
    // }, 3000 );

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
                        url: "{{ route('students.index') }}" + '/' + data_id,
                        id: data_id,
                        success: function() {
                            location.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your student registration has been deleted.',
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#btnUpdateStatus', function(id) {
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
                        type: "UPDATE",
                        url: "{{ route('students.index') }}" + '/' + data_id,
                        id: data_id,
                        success: function() {
                            location.reload();
                            Swal.fire(
                                'Updated!',
                                'Your status has been updated.',
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(function() {
        $('#dpissued').datepicker(); //DATE PASSPORT ISSUED
        $('#dpexpiry').datepicker(); //DATE PASSPORT EXPIRY
    })

    $(document).ready(function() {
        $('input[type="file"]').change(function(e) {
            var count = e.target.files.length;
            var fileName = [];
            let file = [];
            for (var i = 0; i < count; i++) {
                fileName += e.target.files[i].name + "<br>";
            }
            document.getElementById("selected").innerHTML = "Selected files:" + "<br>" + fileName;
        })
    });
</script>
