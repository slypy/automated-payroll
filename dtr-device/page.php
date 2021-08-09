<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Config::SYSTEM_NAME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <?php
    include "../../utils/header4.php";
    ?>
    <script>
        $(function() {
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
                return currentTime = hr + ":" + _min + ":" + sec + " " + ampm;
            }

            setInterval(() => {
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

                if (TimeNow() == "12:11:30 AM") {
                    $.ajax({
                        url: '../time/controller.php?action=addInitialDTR',
                        type: 'POST',
                        data: {
                            start_date: today
                        },
                        success: () => {
                            console.log("New day is up to work :)");
                        },
                        error: (e) => {
                            alert(e);
                        }
                    });
                }

                if(TimeNow() == "12:00:00 PM"){
                    $.ajax({
                        url: '../time/controller.php?action=addInitialDTRNightShift',
                        type: 'POST',
                        data: {
                            start_date: today
                        },
                        success: () => {
                            console.log("New day is up to work :)");
                        },
                        error: (e) => {
                            alert(e);
                        }
                    });
                }
            }, 1000);
        });
    </script>
</head>

<body>
    <?php require_once $page_content; ?>
</body>

</html>