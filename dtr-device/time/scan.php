<div class="scan-container">
    <div id="employee-camera" width="800" height="400"></div>
    <form id="check-id">
        <input type="text" name="employee-id" style="opacity: 0;">
    </form>
    <form id="scanner-form">
        <input type="hidden" name="employee_image" style="opacity: 0">
    </form>
</div>


<script>
    $(document).ready(function() {
        Webcam.set({
            width: 800,
            height: 400,
            image_format: 'jpeg',
            jpeg_quality: 100,
            flip_horiz: true,
            fps: 60,
            constraints: {
                width: {
                    exact: 800
                },
                height: {
                    exact: 400
                }
            },
        });
        // Webcam.attach('#employee-camera');

        $('#scanner-form').submit(function() {
            
        });
    });
</script>