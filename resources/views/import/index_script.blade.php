<script>
    function importFunction() {
        Swal.fire({
            title: 'Import file?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Upload'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formImport").submit();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-middle',
                    showConfirmButton: false,
                    timer: 3000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Upload will start soon',
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
</script>