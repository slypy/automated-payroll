<div class="scan-container">
    <div class="container-top">
        <a href="<?php echo $web_root ?>dtr-device/" class="btn btn-danger">Exit</a>
        <a href="<?php echo $web_root ?>dtr-device/time/index.php?page=register" class="btn btn-primary btn-md">Register</a>
    </div>
    <div id="employee-camera" width="400" height="400"></div>
    <div class="message blink">
        <h6 style="margin-top:5px">Scan your Card or Fingerprint</h6>
    </div>
    <div id="id-input" style="opacity: 1;">
        <form id="check-id">
            <input id="card_id" type="text" name="card_id">
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {
        Webcam.set({
            width: 400,
            height: 400,
            image_format: 'jpeg',
            jpeg_quality: 100,
            flip_horiz: true,
            fps: 60,
            constraints: {
                width: {
                    exact: 400
                },
                height: {
                    exact: 400
                }
            },
        });
        Webcam.attach('#employee-camera');

        // Focus on load
        $('input:text').focus();
        // Force focus
        $('input:text').focusout(function() {
            $(this).focus();
        });

        /**
         * Returns join string of time containing AM or PM
         * @param {string} time 
         * @returns {string} american time
         */
        function toAMPM(time) {
            time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
            if (time.length > 1) {
                time = time.slice(1);
                time[5] = +time[0] < 12 ? " AM" : " PM";
                time[0] = +time[0] % 12 || 12;
                if (time[0] < 10) {
                    time[0] = "0" + time[0].toString();
                }
            }
            return time.join("");
        }

        /**
         * Returns the concatanation of hours and minutes
         * @param {string} time12h 
         * @returns {string} 25-Hour Time format
         */
        function to24(time12h) {
            var [time, modifier] = time12h.split(" ");
            var [hours, minutes] = time.split(":");
            if (hours === "12") {
                hours = "00";
            }
            if (modifier === "PM") {
                hours = parseInt(hours, 10) + 12;
            }
            return `${hours}:${minutes}`;
        }

        /**
         * Returns the sum of start time and end time
         * @param {string} start 
         * @param {string} end 
         * @returns {number} Sum of time difference start and end.
         */
        function diffTime(start, end) {
            start=start.split(":");
            end=end.split(":");
            var startDate=new Date(0, 0, 0, start[0], start[1], 0);
            var endDate=new Date(0, 0, 0, end[0], end[1], 0);
            var diff=endDate.getTime()-startDate.getTime();
            var hours=Math.floor(diff/1000/60/60);
            diff-=hours*(1000*60*60);
            var minutes=Math.floor(diff/1000/60);
            diff-=minutes*(1000*60);
            // If using time pickers with 24 hours format, add the below line get exact hours
            if (hours < 0) hours = hours + 24;
            return parseFloat((hours <= 9 ? "0" : "")+hours+"."+(minutes<=9?"0":"")+minutes);
        }

        function TimeNow() {
            var dateInfo = new Date();
            dateInfo.toLocaleString('en-US', {
                timeZone: 'Asia/Manila'
            });
            /* time */
            var hr,
                _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
                sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
                ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";
            // replace 0 with 12 at midnight, subtract 12 from hour if 13–23
            if (dateInfo.getHours() == 0) {
                hr = 12;
            } else if (dateInfo.getHours() > 12) {
                hr = dateInfo.getHours() - 12;
            } else {
                hr = dateInfo.getHours();
            }
            return currentTime = hr + ":" + _min +" " + ampm;
        }


        $('#check-id').submit(function(event) {
            event.preventDefault();

            var dateT = new Date();
            dateT.toLocaleString('en-US', {
                timeZone: 'Asia/Manila'
            });
            var yyyy = dateT.getFullYear()
            var mm = dateT.getMonth()+1;
            var dd = dateT.getDate();

            if(mm < 10) mm = '0' + mm;
            if(dd < 10) dd = '0' + dd
            var today = yyyy+'-'+mm+'-'+dd;

            var SCANNED_DTR_DATA = {
                card_id: $('#card_id').val(),
                date: today,
                time: TimeNow(),
            }

            var time_in, time_out, over_time_in, over_time_out, itotal_work_hours;
            $.ajax({
                url: 'controller.php',
                type: 'GET',
                async: false,
                data: {
                    action: 'getDTRdata',
                    card_id: $('#card_id').val(),
                    date: today
                },
                dataType: 'json',
                success: (data) =>  {
                    time_in = data[4];
                    time_out = data[5];
                    over_time_in = data[6];
                    over_time_out = data[7];
                    itotal_work_hours = parseFloat(data[8]);
                }
            });

            if(time_in != ''){
                SCANNED_DTR_DATA.total_work_hours = diffTime(to24(time_in), to24(TimeNow()));
            }
            
            if(over_time_in != ''){
                SCANNED_DTR_DATA.total_work_hours = diffTime(to24(over_time_in), to24(TimeNow())) + itotal_work_hours;
            }

            $.ajax({
                url: 'controller.php?action=addDTRWithScanner',
                type: 'POST',
                data: SCANNED_DTR_DATA,
                success: function() {
                    Webcam.snap((data_uri) => {
                        Webcam.upload(data_uri, 'upload-image.php');
                        Webcam.reset();
                    });
                    console.log("updated");
                    $('#check-id')[0].reset();
                },
                error: function() {
                    alert("Employee doesn't exit");
                    $('#check-id')[0].reset();
                }
            });
        });
    });
</script>
