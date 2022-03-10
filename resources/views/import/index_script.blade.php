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