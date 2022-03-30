<script>
    function importFunction() {
        Swal.fire({
            title: 'Import file?',
            text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Upload'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formImport").submit();
                $("#submit-import").attr("disabled", true);
                $('#spinner').html('<div class="spinner-border spinner-border-sm" role="status" id="spin" ></div>');
                jQuery('#formImport').submit();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Uploading',
                    text: "You'll be notified after upload",
                })
            }
        })
    }

    function exportFunction() {
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Download will start soon',
            showConfirmButton: false,
            timer: 3000,
            toast: true
        })
    }

    $(function() {
        $(document).ready(function() {
            $('#formImport').ajaxForm({
                beforeSend: function() {
                    var per = '0';
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var per = percentComplete;
                    $('.progress .progress-bar').css("width", per + '%', function() {
                        return $(this).attr("aria-valuenow", per) + "%";
                    })
                },
                complete: function(xhr) {
                    console.log('File uploaded');
                }
            });
        });
    });
</script>