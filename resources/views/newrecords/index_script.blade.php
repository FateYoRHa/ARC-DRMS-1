<script>
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