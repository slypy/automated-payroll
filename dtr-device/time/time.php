<div class="clock">
    <div class="time">
        <span class="hms"></span>
        <span class="ampm"></span>
        <br>
        <span class="date"></span>
    </div>
    <div style="margin-bottom: -70px; display:flex; flex-direction: column;">
        <a href="<?php echo $web_root ?>dtr-device/time/index.php?page=scan" class="btn btn-secondary btn-lg">Go Now</a>
    </div>
</div>
<script>
    function updateTime() {
        var dateInfo = new Date();
        dateInfo.toLocaleString('en-US', {timeZone: 'Asia/Manila'});
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
        var currentTime = hr + ":" + _min + ":" + sec;
        // print time
        document.getElementsByClassName("hms")[0].innerHTML = currentTime;
        document.getElementsByClassName("ampm")[0].innerHTML = ampm;
        /* date */
        var dow = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ],
            month = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            day = dateInfo.getDate();
        // store date
        var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;

        document.getElementsByClassName("date")[0].innerHTML = currentDate;
    };
    // print time and date once, then update them every second
    updateTime();
    setInterval(function() {
        updateTime()
    }, 1000);
</script>