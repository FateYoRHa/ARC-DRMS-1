<script type="text/javascript">

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
