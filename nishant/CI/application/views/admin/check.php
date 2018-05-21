
<div id="page-wrapper">
    <div id="timestamp"></div>
    
</div>
    <script type="text/javascript">
        $(document).ready(function() {
    setInterval(timestamp, 1000);
});

 $(document).ready(function() {
    $.ajax({
        url: '<?php echo base_url();?>index.php/admission/check1.php',
        success: function(data) {
            alert(data);
            $('#timestamp').html(data);
         
        },
    });
    });
    </script>

