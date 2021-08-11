$(document).ready(function () {
    // load this at the very first to avoid delay of setting active current list
    $('.nav-item a[href^="/acc_admin/'+location.pathname.split('/')[2] +'"]').closest("li").addClass("active");
    $sidebar = $(".sidebar");
    $sidebar_img_container = $sidebar.find(".sidebar-background");
    $full_page = $(".full-page");
    $sidebar_responsive = $("body > .navbar-collapse");
    window_width = $(window).width();
    fixed_plugin_open = $(".sidebar .sidebar-wrapper .nav li.active a p").html();
    if (window_width > 767 && fixed_plugin_open == "Dashboard") {
        if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
            $(".fixed-plugin .dropdown").addClass("open");
        }
    }

    $(".fixed-plugin a").click(function (event) {
        //if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $(".fixed-plugin .active-color span").click(function () {
        $full_page_background = $(".full-page-background");
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        var new_color = $(this).data("color");
        if ($sidebar.length != 0) {
            $sidebar.attr("data-color", new_color);
        }
        if ($full_page.length != 0) {
            $full_page.attr("filter-color", new_color);
        }
        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr("data-color", new_color);
        }
    });

    $(".fixed-plugin .background-color .badge").click(function () {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        var new_color = $(this).data("background-color");
        if ($sidebar.length != 0) {
            $sidebar.attr("data-background-color", new_color);
        }
    });

    $(".fixed-plugin .img-holder").click(function () {
        $full_page_background = $(".full-page-background");
        $(this).parent("li").siblings().removeClass("active");
        $(this).parent("li").addClass("active");
        var new_image = $(this).find("img").attr("src");
        if ($sidebar_img_container.length != 0 && $(".switch-sidebar-image input:checked").length != 0) {
            $sidebar_img_container.fadeOut("fast", function () {
                $sidebar_img_container.css(
                    "background-image",
                    'url("' + new_image + '")'
                );
                $sidebar_img_container.fadeIn("fast");
            });
        }
        if ($full_page_background.length != 0 && $(".switch-sidebar-image input:checked").length != 0) {
            var new_image_full_page = $(".fixed-plugin li.active .img-holder").find("img").data("src");
            $full_page_background.fadeOut("fast", function () {
                $full_page_background.css("background-image",'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn("fast");
            });
        }
        if ($(".switch-sidebar-image input:checked").length == 0) {
            var new_image = $(".fixed-plugin li.active .img-holder").find("img").attr("src");
            var new_image_full_page = $(".fixed-plugin li.active .img-holder").find("img").data("src");
            $sidebar_img_container.css("background-image",'url("' + new_image + '")');
            $full_page_background.css("background-image",'url("' + new_image_full_page + '")');
        }
        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css("background-image",'url("' + new_image + '")');
        }
    });

    $(".switch-sidebar-image input").change(function () {
        $full_page_background = $(".full-page-background");
        $input = $(this);
        if ($input.is(":checked")) {
            if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn("fast");
                $sidebar.attr("data-image", "#");
            }
            if ($full_page_background.length != 0) {
                $full_page_background.fadeIn("fast");
                $full_page.attr("data-image", "#");
            }
            background_image = true;
        } else {
            if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr("data-image");
                $sidebar_img_container.fadeOut("fast");
            }

            if ($full_page_background.length != 0) {
                $full_page.removeAttr("data-image", "#");
                $full_page_background.fadeOut("fast");
            }
            background_image = false;
        }
    });

    $(".switch-sidebar-mini input").change(function () {
        $body = $("body");
        $input = $(this);
        if (md.misc.sidebar_mini_active == true) {
            $("body").removeClass("sidebar-mini");
            md.misc.sidebar_mini_active = false;
            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
        } else {
            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
                "destroy"
            );
            setTimeout(function () {
                $("body").addClass("sidebar-mini");

                md.misc.sidebar_mini_active = true;
            }, 300);
        }
        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function () {
            window.dispatchEvent(new Event("resize"));
        }, 180);
        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function () {
            clearInterval(simulateWindowResize);
        }, 1000);
    });

    /**
     * @param {element} inputs
     * @fires document#change
     */
    $("input[type='date']").on("change", function () {
        $(this).attr("data-date", moment($(this).val(), "YYYY-MM-DD").format(this.getAttribute("data-date-format")));
    }).trigger("change");

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

    /**
     * Returns age from birth date string
     * @param {string} dateString 
     * @returns {number} age
     */
    function getAge(dateString){
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
    

    
    $('#employee-dtr-table').DataTable({
        serverSide: true,
        ajax: {
            url: 'controller.php',
            type: 'GET',
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: 'listDTRRecord'
                }
            },
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: false,
        lengthChange: false,
        ordering: false,
        searching: true,
        bFilter: true,
        bInfo: true,
        columnDefs: [{
            targets: [4,7],
            className: 'text-warning'
        },{
            targets: [5,8],
            className: 'text-danger'
        }]
    });

    setInterval(() => {
        $('#employee-dtr-table').DataTable().draw();
    },5000);

    $('#employee-dtr-record-table').DataTable({
        serverSide: true,
        ajax: {
            url: 'controller.php',
            type: 'GET',
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: 'getEmployeeDTRdata'
                }
                
            },
            dataType: 'json',
            complete: (data) => {
                $('#EmployeeName').text(data['responseJSON'].data[0][2])
            }
        },
        retrieve: true,
        sDom: 'lrtip',
        bAutoWidth: false,
        paging: false,
        lengthChange: false,
        ordering: false,
        searching: true,
        bFilter: true,
        bInfo: true,
        columnDefs: [{
            targets: 8,
            className: 'td-actions text-center'
        }]
    });

    $('#search_data').keyup(function(){
        $('#employee-dtr-record-table').DataTable().search($(this).val()).draw();
    });
    $('#search_data').keypress((e) => {
        if(e.keyCode == 13) return false;
    });
    
    $('#employee-dtr-record-table').on('click', '.update', function(){
        var DTR_ID= $(this).attr('id');
        
        $.ajax({
            url: 'controller.php',
            type: 'GET',
            data: {
                action: 'getEmployeeDTRbyID',
                dtr_id: DTR_ID
            },
            dataType: 'json',
            success: (data) => {
                $('#update-time-in-form').modal({backdrop: "static", keyboard: false,},"show");
                $('#dtr_id').val(DTR_ID);
                $('#start_date').val(data['start_date']);
                $('#time_in').val(data['time_in']);
                $('#end_date').val(data['end_date']);
                $('#time_out').val(data['time_out']);
                $('#ot_start_date').val(data['ot_start_date']);
                $('#over_time_in').val(data['over_time_in']);
                $('#ot_end_date').val(data['ot_end_date']);
                $('#over_time_out').val(data['over_time_out']);

                $('#update-time-in-form').on('shown.bs.modal', function(){
                    $('#start_date').trigger('change');
                    $('#end_date').trigger('change');
                    $('#ot_start_date').trigger('change');
                    $('#ot_end_date').trigger('change');
                }).trigger('shown.bs.modal');
            }
        })
    });
    
    $('#updateEmployeeDTR').submit(function(event){
        event.preventDefault();
        var Update_DTR_DATA = $(this).serialize();

        console.log(Update_DTR_DATA);
        $.ajax({
            url: 'controller.php?action=updateDTRRecord',
            type: 'POST',
            data: Update_DTR_DATA,
            dataType: 'text',
            success: (message) => {
                if(message != 'invalid_account'){
                    $('#update-time-in-form').modal('hide');
                    $('#updateEmployeeDTR')[0].reset();
                    $('#employee-dtr-record-table').DataTable().draw();
                } else {
                    alert("Wrong Password");
                }
            }
        })
    })

    $('#type').change(function(){
        switch($(this).val()){
            case 'Time In':
                $('#time_in').show();
                $('#i_time_in').attr('disabled', false);
                $('#time_out').hide();
                $('#i_time_out').attr('disabled', true);
                $('#over_time_in').hide();
                $('#i_over_time_in').attr('disabled', true);
                $('#over_time_out').hide();
                $('#i_over_time_out').attr('disabled', true);
                break;
            case 'Time Out':
                $('#time_out').show();
                
                $('#i_time_out').attr('disabled', false);
                $('#time_in').hide();
                $('#i_time_in').attr('disabled', true);
                $('#over_time_in').hide();
                $('#i_over_time_in').attr('disabled', true);
                $('#over_time_out').hide();
                $('#i_over_time_out').attr('disabled', true);
                break;
            case 'Over Time In':
                $('#time_in').hide();
                $('#i_time_in').attr('disabled', true);
                $('#time_out').hide();
                $('#i_time_out').attr('disabled', true);
                $('#over_time_in').show();
                $('#i_over_time_in').attr('disabled', false);
                $('#over_time_out').hide();
                $('#i_over_time_out').attr('disabled', true);
                break;
            case 'Over Time Out':
                $('#time_in').hide();
                $('#i_time_in').attr('disabled', true);
                $('#time_out').hide();
                $('#i_time_out').attr('disabled', true);
                $('#over_time_in').hide();
                $('#i_over_time_in').attr('disabled', true);
                $('#over_time_out').show();
                $('#i_over_time_out').attr('disabled', false);
                break;
        }
    }).trigger('change');

    $('#employee_id').keyup(function(){
        var that = this,
        value = $(this).val();
        if(value.length >= 1){
            if(searchRequest != null)
                searchRequest.abort();
            
            searchRequest = $.ajax({
                url: 'controller.php',
                type: 'GET',
                data: {
                    action: 'get_employee_name',
                    employee_id: value,
                },
                dataType: 'json',
                success: function(data){

                    if(value == $(that).val() && typeof(data[7]) != 'undefined' || typeof(data[8]) != 'undefined'){
                        $('#employee_name').val(`${data[8]} ${data[9]}`);
                    } else {
                        $('#employee_name').val('');
                    }
                },
            });
        }
    });

    $('#addDTRRecord').submit(function(event){
        event.preventDefault();
        // don't serialize the form because it should be manually listed for necessary functions
        var DTR_DATA = {
            employee_id: $('#employee_id').val(),
            employee_name: $('#employee_name').val(),
            type: $('#type').val(),
            date: $('#date').val(),
            time_in: $('#i_time_in').val(),
            time_out: $('#i_time_out').val(),
            over_time_in: $('#i_over_time_in').val(),
            over_time_out: $('#i_over_time_out').val(),
        }

        $.ajax({
            url: 'controller.php?action=addDTRRecord',
            type: 'POST',
            data: DTR_DATA,
            success: function(){
                $('#addDTRRecord')[0].reset();
                $('#add-dtr-form').modal('hide');
                $('#employee-dtr-table').DataTable().draw();
            }
        })
    });

    $('#payroll-report-table').DataTable({
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 15,
        drawCallback: function(settings){
            var api = this.api(), data;

            var floatval = function(i){
                return typeof(i) === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof(i) === 'number' ? i : 0;
            }

            var NetPay_total = api.column(3).data().reduce(function(a, b){
                return floatval(a) + floatval(b);
            }, 0);

            var GrossPay_total = api.column(4).data().reduce(function(a, b){
                return floatval(a) + floatval(b);
            }, 0)

            $(api.column(3).footer()).html('$' + NetPay_total);
            $(api.column(4).footer()).html('$' + GrossPay_total);
        }
    });

    //
    // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
    //
    $.fn.dataTable.pipeline = function ( opts ) {
        // Configuration options
        var conf = $.extend( {
            pages: 5,     // number of pages to cache
            url: '',      // script url
            data: null,   // function or object with parameters to send to the server
                          // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
        }, opts );
    
        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        var cacheLastJson = null;
    
        return function ( request, drawCallback, settings ) {
            var ajax          = false;
            var requestStart  = request.start;
            var drawStart     = request.start;
            var requestLength = request.length;
            var requestEnd    = requestStart + requestLength;
            
            if ( settings.clearCache ) {
                // API requested that the cache be cleared
                ajax = true;
                settings.clearCache = false;
            }
            else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                // outside cached data - need to make a request
                ajax = true;
            }
            else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                    JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                    JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
            ) {
                // properties changed (ordering, columns, searching)
                ajax = true;
            }
            
            // Store the request for checking next time around
            cacheLastRequest = $.extend( true, {}, request );
    
            if ( ajax ) {
                // Need data from the server
                if ( requestStart < cacheLower ) {
                    requestStart = requestStart - (requestLength*(conf.pages-1));
    
                    if ( requestStart < 0 ) {
                        requestStart = 0;
                    }
                }
                
                cacheLower = requestStart;
                cacheUpper = requestStart + (requestLength * conf.pages);
    
                request.start = requestStart;
                request.length = requestLength*conf.pages;
    
                // Provide the same `data` options as DataTables.
                if ( typeof conf.data === 'function' ) {
                    // As a function it is executed with the data object as an arg
                    // for manipulation. If an object is returned, it is used as the
                    // data object to submit
                    var d = conf.data( request );
                    if ( d ) {
                        $.extend( request, d );
                    }
                }
                else if ( $.isPlainObject( conf.data ) ) {
                    // As an object, the data given extends the default
                    $.extend( request, conf.data );
                }
    
                return $.ajax( {
                    "type":     conf.method,
                    "url":      conf.url,
                    "data":     request,
                    "dataType": "json",
                    "cache":    false,
                    "success":  function ( json ) {
                        cacheLastJson = $.extend(true, {}, json);
    
                        if ( cacheLower != drawStart ) {
                            json.data.splice( 0, drawStart-cacheLower );
                        }
                        if ( requestLength >= -1 ) {
                            json.data.splice( requestLength, json.data.length );
                        }
                        
                        drawCallback( json );
                    }
                } );
            }
            else {
                json = $.extend( true, {}, cacheLastJson );
                json.draw = request.draw; // Update the echo for each response
                json.data.splice( 0, requestStart-cacheLower );
                json.data.splice( requestLength, json.data.length );
    
                drawCallback(json);
            }
        }
    };
    
    // Register an API method that will empty the pipelined data, forcing an Ajax
    // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register( 'clearPipeline()', function () {
        return this.iterator( 'table', function ( settings ) {
            settings.clearCache = true;
        } );
    } );

    function checkedBoxRemove(){
        let length=$('.checked_remove_employee').length,
            total_checked=0;   
        $('.checked_remove_employee').each(function(){
            if(this.checked){
                total_checked+=1;
            }
        });
        if(total_checked == length)
            $('#check_all').prop('checked', true);
        else
            $('#check_all').prop('checked', false);
    }
    
    function checkedBoxDelete(){
        let length=$('.checked_delete_employee').length,
            total_checked=0;
            
        $('.checked_delete_employee').each(function(){
            if(this.checked){
                total_checked+=1;
            }
        });
        if(total_checked == length)
            $('#check_all_removed').prop('checked', true);
        else
            $('#check_all_removed').prop('checked', false);
    }
 
    // Data Table for Active employees
    $("#active-employee-table").DataTable({
        serverSide: true,
        ajax: $.fn.dataTable.pipeline({
            url: 'controller.php',
            type: 'GET',
            data: (d) => {
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listEmployee",
                }
            },
            dataType: "json",
            pages: (d) => {
                return Math.ceil(d.length / 10);
            }
        }),
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        stateSave: true,
        columnDefs: [
        {
            targets: 6,
            width: '20px',
        },
        {
            targets: [6,7],
            className: "td-actions text-center",
            width: 100
        },
        {
            targets: [0],
            className: "text-center",
        }],
    });
    // Data Table for removed employees
    $("#removed-employee-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listRemovedEmployee",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 15,
        columnDefs: [
            {
                targets: 5,
                width: '25px'
            },
            {
                targets: [5,6],
                className: "td-actions text-center",
                width: 100
            },
            {
                targets: [0],
                className: "text-center",
            },
        ],
    });
    
    $("#position-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listPositions",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 15,
        columnDefs: [
            {
                targets: [3],
                className: "td-actions text-center",
            },
            {
                targets: [1, 2],
                className: "text-center",
            },
        ],
    });

    $("#over-time-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listOverTime",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        searching: false,
        paging: false,
        ordering: false,
        bInfo: false,
        bAutoWidth: false,
        columnDefs: [
            {
                targets: 1,
                width: "200px",
            },
            {
                targets: 2,
                width: "50px",
                className: "td-actions text-center",
            },
        ],
    });
    // Server Side DataTable {Late Policy}
    $("#late-policy-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listLatePolicy",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        searching: false,
        paging: false,
        ordering: false,
        bInfo: false,
        bAutoWidth: false,
        columnDefs: [
            {
                targets: 2,
                width: "50px",
                className: "td-actions text-center",
            },
        ],
    });

    $("#employee-shifting-hours-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listShiftingHours",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        ordering: false,
        searching: true,
        bFilter: true,
        pageLength: 15,
        columnDefs: [
            {
                targets: [5],
                className: "td-actions text-left",
            },
        ],
    });

   

    $("#addJobPosition").submit(function (event) {
        event.preventDefault();
        var Position_Data = {
            position_name: $("#position_name").val(),
            wage_salary: $("#wage_salary").val(),
            wage_type: $("#wage_type").val(),
        };
        $.ajax({
            type: "POST",
            url: "controller.php?action=add_position",
            data: Position_Data,
            success: function (data) {
                $("#add-job-position-form").modal("hide");
                $("#addJobPosition")[0].reset();
                $("#position-table").DataTable().draw();
            },
        });
    });

    $("#position-table").on("click", ".delete", function () {
        var posID = $(this).attr("id");
        if (confirm("Are you sure you want to delete this position?")) {
            $.ajax({
                url: "controller.php",
                method: "GET",
                data: {
                    pos_id: posID,
                    action: "position_delete",
                },
                success: function () {
                    $("#position-table").DataTable().draw();
                },
            });
        } else {
            return false;
        }
    });

    $("#position-table").on("click", ".update", function () {
        var posID = $(this).attr("id");
        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                pos_id: posID,
                action: "get_job_position",
            },
            dataType: "json",
            success: function (data) {
                $("#update-job-position-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );
                $("#update-job-position-form #position_name").val(data['position_name']);
                $("#update-job-position-form #wage_salary").val(data['wage_salary']);
                $("#update-job-position-form #wage_type").val(data['wage_type']);
            },
        });
    });

    $("#updateJobPosition").submit(function (event) {
        event.preventDefault();
        var Position_Data = {
            position_name: $("#updateJobPosition #position_name").val(),
            wage_salary: $("#updateJobPosition #wage_salary").val(),
            wage_type: $("#updateJobPosition #wage_type").val(),
        };
        $.ajax({
            type: "POST",
            url: "controller.php?action=update_job_position",
            data: Position_Data,
            success: function () {
                $("#update-job-position-form").modal("hide");
                $("#updateJobPosition")[0].reset();
                $("#position-table").DataTable().draw();
            },
        });
    });

    $("#addShiftingHours").submit(function (event) {
        var totalWorkHours =
            diffTime($("#start_time").val(), $("#end_time").val()) -
            $("#break_time").val();
        var ShiftingHours_Data = {
            shifting_type_name: $("#shifting_type_name").val(),
            start_time: toAMPM($("#start_time").val()),
            end_time: toAMPM($("#end_time").val()),
            break_time: $("#break_time").val(),
            total_work_hours: totalWorkHours,
        };

        $.ajax({
            url: "controller.php?action=add_shifting_type",
            method: "POST",
            data: ShiftingHours_Data,
            success: function () {
                $("#addShiftingHours")[0].reset();
                $("#add-custom-shifting-type-form").modal("hide");
                $("#employee-shifting-hours-table").DataTable().draw();
            },
        });
        event.preventDefault();
    });

    $("#employee-shifting-hours-table").on("click", ".delete", function () {
        var shiftID = $(this).attr("id");
        if (confirm("Are you sure you want to delete this shifiting type?")) {
            $.ajax({
                url: "controller.php",
                method: "GET",
                data: {
                    shift_id: shiftID,
                    action: "shifting_type_delete",
                },
                success: function () {
                    $("#employee-shifting-hours-table").DataTable().draw();
                },
            });
        } else {
            return false;
        }
    });

    $("#employee-shifting-hours-table").on("click", ".update", function () {
        var shiftID = $(this).attr("id");
        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                shift_id: shiftID,
                action: "get_shifting_type",
            },
            dataType: "json",
            success: function (data) {
                $("#update-custom-shifting-type-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );
                $("#updateShiftingHours #shifting_type_name").val(data['shifting_type_name']);
                $("#updateShiftingHours #start_time").val(to24(data['start_time']));
                $("#updateShiftingHours #end_time").val(to24(data['end_time']));
                $("#updateShiftingHours #break_time").val(data['break_time']);
            },
        });
    });

    $("#late-policy-table").on("click", ".update", function () {
        var latepolicyID = $(this).attr("id");
        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                latepolicy_id: latepolicyID,
                action: "get_late_policy",
            },
            dataType: "json",
            success: function (data) {
                $("#update-late-policy-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );

                var float_time = data[1].split(".");

                var hours = float_time[0],
                    minutes = float_time[1];

                $("#latepolicy_hours").val(hours);
                $("#latepolicy_minutes").val(minutes);
                $("#penalty_amount").val(data[2]);
            },
        });
    });

    $("#updateLatePolicy").submit(function (event) {
        event.preventDefault();

        var LatePolicyData = {
            latepolicy_hours: $("#latepolicy_hours").val(),
            latepolicy_minutes: $("#latepolicy_minutes").val(),
            penalty_amount: $("#penalty_amount").val(),
        };

        $.ajax({
            url: "controller.php?action=update_latepolicy",
            method: "POST",
            data: LatePolicyData,
            success: function () {
                $("#updateLatePolicy")[0].reset();
                $("#update-late-policy-form").modal("hide");
                $("#late-policy-table").DataTable().draw();
            },
        });
    });

    $("#over-time-table").on("click", ".update", function () {
        var overtimeID = $(this).attr("id");

        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                overtime_id: overtimeID,
                action: "get_overtime_data",
            },
            dataType: "json",
            success: function (data) {
                $("#update-over-time-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );

                var float_time = data[2].split(".");

                var hours = float_time[0],
                    minutes = float_time[1];

                $("#overtime_hours").val(hours);
                $("#overtime_minutes").val(minutes);
            },
        });
    });

    $("#updateOverTime").submit(function (event) {
        event.preventDefault();

        var OverTimeData = {
            overtime_hours: $("#overtime_hours").val(),
            overtime_minutes: $("#overtime_minutes").val(),
        };

        $.ajax({
            url: "controller.php?action=update_overtime",
            method: "POST",
            data: OverTimeData,
            success: function () {
                $("#updateOverTime")[0].reset(),
                    $("#update-over-time-form").modal("hide");
                $("#over-time-table").DataTable().draw();
            },
        });
    });

    $("#updateShiftingHours").submit(function (event) {
        var startTime = $("#updateShiftingHours #start_time").val(),
            endTime = $("#updateShiftingHours #end_time").val(),
            breakTime = $("#updateShiftingHours #break_time").val(),
            timeDifference = diffTime(startTime, endTime),
            totalWorkHours = timeDifference - breakTime;
        var ShiftingHours_Data = {
            shifting_type_name: $(
                "#updateShiftingHours #shifting_type_name"
            ).val(),
            start_time: toAMPM($("#updateShiftingHours #start_time").val()),
            end_time: toAMPM($("#updateShiftingHours #end_time").val()),
            break_time: $("#updateShiftingHours #break_time").val(),
            total_work_hours: totalWorkHours,
        };
        $.ajax({
            url: "controller.php?action=update_shifting_type",
            method: "POST",
            data: ShiftingHours_Data,
            success: function () {
                $("#updateShiftingHours")[0].reset();
                $("#update-custom-shifting-type-form").modal("hide");
                $("#employee-shifting-hours-table").DataTable().draw();
            },
        });
        event.preventDefault();
    });

    $('#addEmployee #birth_date').on('change', function(){
        $('#addEmployee #age').val(getAge(this.value));
    });

    $("#worker_type").on("change", function () {
        if ($("#worker_type").val() === "Regular" || $("#worker_type").val() === "Contractual") {
            $("div[data-id='employee-gov'").show();
            $("div[data-id='employee-gov'] input").attr("disabled", false);
        } else {
            $("div[data-id='employee-gov'").hide();
            $("div[data-id='employee-gov'] input").attr("disabled", true);
        }
    });

    $("#u-worker-type").on("change", function () {
        if (this.value === "Regular" || this.value === "Contractual") {
            $("div[data-id='employee-gov'").show();
            $("div[data-id='employee-gov'] input").attr("disabled", false);
        } else {
            $("div[data-id='employee-gov'").hide();
            $("div[data-id='employee-gov'] input").attr("disabled", true);
        }
    });

    // trigger change duration date inputs
    $("#duration_date").on("change", function () {
        switch ($(this).val()) {
            case "3 Months":
                var date = new Date();
                    date.setMonth(date.getMonth() + 3);
                $("#end_date").val(moment(date).format("YYYY-MM-DD")).change();
                break;
            case "6 Months":
                var date = new Date();
                    date.setMonth(date.getMonth() + 6);
                    $("#end_date").val(moment(date).format("YYYY-MM-DD")).change();
                break;
            case "1 Year":
                var date = new Date();
                    date.setMonth(date.getMonth() + 12);
                    $("#end_date").val(moment(date).format("YYYY-MM-DD")).change();
                break;
            case "2 Years":
                var date = new Date();
                    date.setMonth(date.getMonth() + 24);
                    $("#end_date").val(moment(date).format("YYYY-MM-DD")).change();
                break;
            default:
                $("#end_date").val("").change();
                break;
            }
    }).trigger("change");

    $("#add-employee-form").one("shown.bs.modal", function () {
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchJobPositions"},
            dataType: "html",
            success: function (data) {
                $("#job_position").append(data);
            },
        });
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchShiftingTypes"},
            dataType: "html",
            success: function (data) {
                $("#shifting_type").append(data);
            },
        });
    });

    $('#check_all').change(function(){
        $('.checked_remove_employee').prop('checked', $(this).prop('checked'));
    });
    $('#check_all_removed').change(function(){
        $('.checked_delete_employee').prop('checked', $(this).prop('checked'));
    });

    $("#update-employee-form").one("shown.bs.modal", function () {
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchJobPositions"},
            dataType: "html",
            success: function (data) {
                $("#updateEmployee #job_position").append(data);
            },
        });
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchShiftingTypes"},
            dataType: "html",
            success: function (data) {
                $("#updateEmployee #shifting_type").append(data);
            },
        });
    });

    $("#update-employee-form").on("shown.bs.modal", function () {
        if ($("#updateEmployee #worker_type").val() === "Regular" || $("#updateEmployee #worker_type").val() === "Contractual") {
            $("#updateEmployee div[data-id='employee-gov']").show();
            $("#updateEmployee div[data-id='employee-gov'] input").attr("disabled",false);
        } else {
            $("#updateEmployee div[data-id='employee-gov']").hide();
            $("#updateEmployee div[data-id='employee-gov'] input").attr("disabled",true);
        }
    }).trigger("shown.bs.modal");

    $("#updateEmployee #worker_type").on("change", function () {
        if ($("#updateEmployee #worker_type").val() === "Regular" || $("#updateEmployee #worker_type").val() === "Contractual") {
            $("#updateEmployee div[data-id='employee-gov'").show();
            $("#updateEmployee div[data-id='employee-gov'] input").attr("disabled",false);
        } else {
            $("#updateEmployee div[data-id='employee-gov'").hide();
            $("#updateEmployee div[data-id='employee-gov'] input").attr("disabled",true);
        }
    }).trigger("change");
    
    $("#addEmployee").on("submit", function (event) {
        event.preventDefault();
        var newEmployeeData=$("#addEmployee").serialize();
        $.ajax({
            url: "controller.php?action=add_employee",
            method: "POST",
            data: newEmployeeData,
            success: function () {
                $("#addEmployee")[0].reset();
                $("#add-employee-form").modal("hide");
                $("#active-employee-table").DataTable().draw();
            },
        });
    });

    $("#active-employee-table").on("click", ".update", function () {
        var EmployeeID = $(this).attr("id");
        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                employee_id: EmployeeID,
                action: "get_employee_data",
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#update-employee-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );
                $("#updateEmployee #employee_number").val(data['employee_number']);
                $("#updateEmployee #card_id").val(data['card_id']);
                $("#updateEmployee #fingerprint_number").val(data['fingerprint_number']);
                $("#updateEmployee #worker_type").val(data['worker_type']);
                $("#updateEmployee #job_position").val(data['job_position']);
                $("#updateEmployee #shifting_type").val(data['shifting_type_name']);
                $("#updateEmployee #first_name").val(data['first_name']);
                $("#updateEmployee #last_name").val(data['last_name']);
                $("#updateEmployee #middle_name").val(data["middle_name"]);
                $("#updateEmployee #birth_date").val(data['birth_date']);
                $("#updateEmployee #age").val(data['age']);
                $("#updateEmployee #gender").val(data['gender']);
                $("#updateEmployee #civil_status").val(data['civil_status']);
                $("#updateEmployee #full_address").val(data['full_address']);
                $("#updateEmployee #email").val(data['email']);
                $("#updateEmployee #contact_number").val(data['contact_number']);
                $("#updateEmployee #contact_person").val(data['contact_person']);
                $("#updateEmployee #contact_person_number").val(data['contact_person_number']);
                $("#updateEmployee #relationship").val(data['relationship']);
                $("#updateEmployee #duration_date").val(data['duration_date']);
                $("#updateEmployee #start_date").val(data['start_date']);
                $("#updateEmployee #end_date").val(data['end_date']);
                $("#updateEmployee #sss_number").val(data['sss_number']);
                $("#updateEmployee #employee_er").val(data['employee_er']);
                $("#updateEmployee #employee_ee").val(data['employee_ee']);
                $("#updateEmployee #sss_active_loan").val(data['sss_active_loan']);
                $("#updateEmployee #philhealth_number").val(data['philhealth_number']);
                $("#updateEmployee #philhealth_per_month").val(data['philhealth_per_month']);
                $("#updateEmployee #pag_ibig_number").val(data['pag_ibig_number']);
                $("#updateEmployee #pag_ibig_per_month").val(data['pag_ibig_per_month']);
                $("#updateEmployee #pag_ibig_active_loan").val(data['pag_ibig_active_loan']);
            },
        });
    });

    $("#active-employee-table").on("click", ".delete", function () {
        var EmployeeID = $(this).attr("id");
        if (confirm("Are you sure you want to remove this Employee?")) {
            $.ajax({
                url: "controller.php",
                method: "GET",
                data: {
                    employee_id: EmployeeID,
                    action: "remove_employee_data",
                },
                success: function () {
                    $("#active-employee-table").DataTable().draw();
                    $('#removed-employee-table').DataTable().draw();
                },
            });
        } else {
            return false;
        }
    });
    $("#removed-employee-table").on("click", ".delete", function () {
        var EmployeeID = $(this).attr("id");
        if (confirm("Are you sure you want to delete this Employee?")) {
            $.ajax({
                url: "controller.php",
                method: "GET",
                data: {
                    employee_id: EmployeeID,
                    action: "delete_employee_data",
                },
                success: function () {
                    $("#active-employee-table").DataTable().draw();
                    $('#removed-employee-table').DataTable().draw();
                },
            });
        } else {
            return false;
        }
    });

    $('#remove_active_employee').on('click', function(){
        var selected_employee=[];
        $('input:checkbox[class=checked_remove_employee]:checked').each(function(){
            selected_employee.push($(this).val());
        });
        if(selected_employee.length>0){
            if(confirm("Are you sure want to remove the selected employees?")){
                $.ajax({
                    url: 'controller.php?action=remove_selected_employees',
                    type: 'POST',
                    data: {
                        selected_employee: selected_employee
                    },
                    success: function(){
                        $('#active-employee-table').DataTable().draw();
                        $('#removed-employee-table').DataTable().draw();
                    }
                })
            }
        }
    });

    $('#delete_removed_employee').on('click', function(){
        var selected_removed_employee=[];
        $('input:checkbox[class=checked_delete_employee]:checked').each(function(){
            selected_removed_employee.push($(this).val());
        });
        if(selected_removed_employee.length>0){
            if(confirm("Are you sure want to delete the selected employees?")){
                $.ajax({
                    url: 'controller.php?action=delete_selected_employees',
                    type: 'POST',
                    data: {
                        selected_removed_employee: selected_removed_employee
                    },
                    success: function(){
                        $('#active-employee-table').DataTable().draw();
                        $('#removed-employee-table').DataTable().draw();
                    }
                })
            }
        }
    });

    $("#updateEmployee").on("submit", function (event) {
        event.preventDefault();
        var newEmployeeData = $("#updateEmployee").serialize();
        $.ajax({
            url: "controller.php?action=update_employee_data",
            method: "POST",
            data: newEmployeeData,
            success: function () {
                $("#updateEmployee")[0].reset();
                $("#update-employee-form").modal("hide");
                $("#active-employee-table").DataTable().draw();
            },
        });
    });

    $("#info-employee-form").one("shown.bs.modal", function () {
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchJobPositions"},
            dataType: "html",
            success: function (data) {
                $("#employeeInfo #job_position").append(data);
            },
        });
        $.ajax({
            url: "controller.php",
            type: "GET",
            data: {action: "fetchShiftingTypes"},
            dataType: "html",
            success: function (data) {
                $("#employeeInfo #shifting_type").append(data);
            },
        });
    })

    $("#info-employee-form").on("shown.bs.modal", function () {
        if ($("#employeeInfo #worker_type").val() === "Regular" || $("#employeeInfo #worker_type").val() === "Contractual") {
            $("#employeeInfo div[data-id='employee-gov']").show();
                $("#employeeInfo div[data-id='employee-gov'] input").attr("disabled", false);
        } else {
            $("#employeeInfo div[data-id='employee-gov']").hide();
            $("#employeeInfo div[data-id='employee-gov'] input").attr("disabled", true);
        }
    }).trigger("shown.bs.modal");

    $("#active-employee-table").on("click", ".info", function () {
        $("#employeeInfo input").prop("readonly", true);
        $("#employeeInfo select").css("pointer-events", "none");
        var EmployeeID = $(this).attr("id");
        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                employee_id: EmployeeID,
                action: "get_employee_data",
            },
            dataType: "json",
            success: function (data) {
                $("#info-employee-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );
                $("#employeeInfo #employee_number").val(data['employee_number']);
                $("#employeeInfo #card_id").val(data['card_id']);
                $("#employeeInfo #fingerprint_number").val(data['fingerprint_number']);
                $("#employeeInfo #worker_type").val(data['worker_type']);
                $("#employeeInfo #job_position").val(data['job_position']);
                $("#employeeInfo #shifting_type").val(data['shifting_type_name']);
                $("#employeeInfo #first_name").val(data['first_name']);
                $("#employeeInfo #last_name").val(data['last_name']);
                $("#employeeInfo #middle_name").val(data["middle_name"]);
                $("#employeeInfo #birth_date").val(data['birth_date']);
                $("#employeeInfo #age").val(data['age']);
                $("#employeeInfo #gender").val(data['gender']);
                $("#employeeInfo #civil_status").val(data['civil_status']);
                $("#employeeInfo #full_address").val(data['full_address']);
                $("#employeeInfo #email").val(data['email']);
                $("#employeeInfo #contact_number").val(data['contact_number']);
                $("#employeeInfo #contact_person").val(data['contact_person']);
                $("#employeeInfo #contact_person_number").val(data['contact_person_number']);
                $("#employeeInfo #relationship").val(data['relationship']);
                $("#employeeInfo #duration_date").val(data['duration_date']);
                $("#employeeInfo #start_date").val(data['start_date']);
                $("#employeeInfo #end_date").val(data['end_date']);
                $("#employeeInfo #sss_number").val(data['sss_number']);
                $("#employeeInfo #employee_er").val(data['employee_er']);
                $("#employeeInfo #employee_ee").val(data['employee_ee']);
                $("#employeeInfo #sss_active_loan").val(data['sss_active_loan']);
                $("#employeeInfo #philhealth_number").val(data['philhealth_number']);
                $("#employeeInfo #philhealth_per_month").val(data['philhealth_per_month']);
                $("#employeeInfo #pag_ibig_number").val(data['pag_ibig_number']);
                $("#employeeInfo #pag_ibig_per_month").val(data['pag_ibig_per_month']);
                $("#employeeInfo #pag_ibig_active_loan").val(data['pag_ibig_active_loan']);
            },
        });
    });
    
    // break;

// case 'EmployeeCredits':
    $('#staff-ca-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listStaffCA",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [5],
                className: 'td-actions text-center'
            }
        ]
    });

    $('#paid-staff-ca-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listPaidStaffCA",
                }
            },
            dataType: "json",
            liveAjax: true,
            interval: 1000,
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [5],
                className: 'td-actions text-center'
            }
        ]
    });
    $('#staff-loan-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listStaffLoan",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [7],
                className: 'td-actions text-center'
            }
        ]
    });

    $('#paid-staff-loan-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listPaidStaffLoan",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [7],
                className: 'td-actions text-center'
            }
        ]
    });

    $('#employee-misc-table').DataTable({
        serverSide: true,
        ajax: {
            url: 'controller.php',
            type: 'GET',
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: 'listEmployeeMisc',
                }
            },
            dataType: 'json',
        },
        retrieve: true,
        dom: 'ftipr',
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [5],
                className: 'td-actions text-center'
            }
        ]
    });

    $('#paid-employee-misc-table').DataTable({
        serverSide: true,
        ajax: {
            url: 'controller.php',
            type: 'GET',
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: 'listPaidEmployeeMisc',
                }
            },
            dataType: 'json',
        },
        retrieve: true,
        dom: 'ftipr',
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [5],
                className: 'td-actions text-center'
            }
        ]
    });
    $('#staff-damages-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listStaffDamages",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [6],
                className: 'td-actions text-center'
            }
        ]
    });

    $('#paid-staff-damages-table').DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: (d) => { //set custom post data to avoid slow query
                return {
                    draw: d.draw,
                    start: d.start,
                    length: d.length,
                    'search[value]': d.search['value'],
                    action: "listPaidStaffDamages",
                }
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 10,
        columnDefs: [
            {
                targets: [6],
                className: 'td-actions text-center'
            }
        ]
    });
    var searchRequest = null;

    $('#employee_number').keyup(function(){
        var that = this,
        value = $(this).val();
        if(value.length >= 1){
            if(searchRequest != null)
                searchRequest.abort();
            
            searchRequest = $.ajax({
                url: 'controller.php',
                type: 'GET',
                data: {
                    action: 'get_employee_name',
                    employee_id: value,
                },
                dataType: 'json',
                success: function(data){

                    if(value == $(that).val() && typeof(data[7]) != 'undefined' || typeof(data[8]) != 'undefined'){
                        $('#employee_name').val(`${data[8]} ${data[9]}`);
                    } else {
                        $('#employee_name').val('');
                    }
                },
            });
        }
    });
    
    $('#addStaffCA').on('submit', function(event){
        event.preventDefault();
        var CashDATA = $('#addStaffCA').serialize();
        $.ajax({
            url: 'controller.php?action=add_staff_ca',
            method: 'POST',
            data: CashDATA,
            success: function(){
                $('#addStaffCA')[0].reset();
                $('#new-ca-form').modal('hide');
                $('#staff-ca-table').DataTable().draw();
                $('#paid-staff-ca-table').DataTable().draw();
            }
        })
    });

    $('#staff-ca-table').on('click', '.update', function(){
        var CA_ID = $(this).attr('id');
        $.ajax({
            url: 'controller.php',
            type: 'GET',
            data: {
                action: 'get_staff_ca',
                ca_id: CA_ID
            },
            dataType: 'json',
            success: function(data){
                $('#update-ca-form').modal({
                    backdrop: 'static',
                    keyboard: false,
                }, 'show');

                $('#updateStaffCA #employee_number').val(data[1]);
                $('#updateStaffCA #employee_name').val(data[2]);
                $('#updateStaffCA #ca_date').val(data[3]);
                $('#updateStaffCA #ca_amount').val(data[5]);
                $('#updateStaffCA #ca_remarks').val(data[6]);
            }
        });
    });

    $('#updateStaffCA').on('submit', function(event){
        event.preventDefault();
        var CashDATA = $('#updateStaffCA').serialize();
        $.ajax({
            url: 'controller.php?action=update_staff_ca',
            method: 'POST',
            data: CashDATA,
            success: function(){
                $('#updateStaffCA')[0].reset();
                $('#update-ca-form').modal('hide');
                $('#staff-ca-table').DataTable().draw();
                $('#paid-staff-ca-table').DataTable().draw();
            }
        });
    })



    $('#addStaffLoan #employee_id').keyup(function(){
        var that = this,
        value = $(this).val();
        
        if(value.length >= 1){
            if(searchRequest != null)
                searchRequest.abort();
            
            searchRequest = $.ajax({
                url: 'controller.php',
                type: 'GET',
                data: {
                    action: 'get_employee_name',
                    employee_id: value,
                },
                dataType: 'json',
                success: function(data){
                    if(value == $(that).val() && typeof(data[7]) != 'undefined' || typeof(data[8]) != 'undefined'){
                        $('#addStaffLoan #employee_name').val(`${data[8]} ${data[9]}`);
                    } else {
                        $('#addStaffLoan #employee_name').val('');
                    }
                },
            });
        }
    });

    $('#addStaffLoan #loan_amount').keyup(function(){
        var loan_amount=parseFloat($(this).val()),
            loan_interest=parseFloat($('#addStaffLoan #loan_interest').val());
        if (isNaN(loan_amount) || isNaN(loan_interest)){
            loan_amount=0;
            loan_interest=0;
        }
        var sub_total=parseFloat(loan_amount*loan_interest)/100,
            total_balance=parseFloat(sub_total)+parseFloat(loan_amount);
        $('#loan_balance').val(parseFloat(total_balance));
    });

    $('#addStaffLoan #loan_interest').keyup(function(){
        var loan_interest=parseFloat($(this).val()),
            loan_amount=parseFloat($('#addStaffLoan #loan_amount').val());
        if (isNaN(loan_amount) || isNaN(loan_interest)){
            loan_amount=0;
            loan_interest=0;
        }
        var sub_total=parseFloat(loan_amount*loan_interest)/100,
            total_balance=parseFloat(sub_total)+parseFloat(loan_amount);
        $('#loan_balance').val(parseFloat(total_balance));
    });

    $('#addStaffLoan').on('submit',function(event){
        event.preventDefault();
        var LoanData=$(this).serialize();
        $.ajax({
            url: 'controller.php?action=add_staff_loan',
            method: 'POST',
            data: LoanData,
            success: function(){
                $('#addStaffLoan')[0].reset();
                $('#new-loan-form').modal('hide');
                $('#staff-loan-table').DataTable().draw();
                $('#paid-staff-loan-table').DataTable().draw();
            }
        })
    });

    $('#staff-loan-table').on('click', '.update', function(){
        var Loan_ID=$(this).attr('id');
        
        $.ajax({
            url: 'controller.php',
            type: 'GET', 
            data: {
                action: 'get_staff_loan',
                loan_id: Loan_ID
            },
            dataType: 'json',
            success: function(data){
                $('#update-loan-form').modal({
                    backdrop: 'static',
                    keyboard: false,
                }, 'show');

                $('#updateStaffLoan #employee_id').val(data[1]);
                $('#updateStaffLoan #employee_name').val(data[2]);
                $('#updateStaffLoan #date_of_loan').val(data[3]);
                $('#updateStaffLoan #due_date').val(data[4]);
                $('#updateStaffLoan #loan_amount').val(data[5]);
                $('#updateStaffLoan #loan_interest').val(data[6]);
                $('#updateStaffLoan #loan_balance').val(data[7]);
                $('#updateStaffLoan #loan_remarks').val(data[8]);
            }
        });
    });

    $('#updateStaffLoan').on('submit', function(event){
        event.preventDefault();
        var LoanData=$(this).serialize();

        $.ajax({
            url: 'controller.php?action=update_staff_loan',
            method: 'POST',
            data: LoanData,
            success: function(){
                $('#updateStaffLoan')[0].reset();
                $('#update-loan-form').modal('hide');
                $('#staff-loan-table').DataTable().draw();
                $('#paid-staff-loan-table').DataTable().draw();
            }
        })
    })
    
    

    $('#addStaffDamages #employee_number').keyup(function(){
        var that = this,
        value = $(this).val();
        if(value.length >= 1){
            if(searchRequest != null)
                searchRequest.abort();
    
            searchRequest = $.ajax({
                url: 'controller.php',
                type: 'GET',
                data: {
                    action: 'get_employee_name',
                    employee_id: value,
                },
                dataType: 'json',
                success: function(data){
                    if(value == $(that).val() && typeof(data[7]) != 'undefined' || typeof(data[8]) != 'undefined'){
                        $('#addStaffDamages #employee_name').val(`${data[8]} ${data[9]}`);
                    } else {
                        $('#addStaffDamages #employee_name').val('');
                    }
                },
            });
        }
    });

    $('#addStaffDamages').on('submit', function(event){
        event.preventDefault();
        var Damage_Data = $(this).serialize();
        $.ajax({
            url: 'controller.php?action=add_staff_damages',
            type: 'POST',
            data: Damage_Data,
            success: function(){
                $('#addStaffDamages')[0].reset();
                $('#new-damages-form').modal('hide');
                $('#staff-damages-table').DataTable().draw();
            }
        })
    })

    $('#staff-damages-table').on('click', '.update', function(){
        var Damage_ID=$(this).attr('id');
        $.ajax({
            url: 'controller.php',
            type: 'GET', 
            data: {
                action: 'get_staff_damages',
                damage_id: Damage_ID
            },
            dataType: 'json',
            success: function(data){
                $('#update-damages-form').modal({
                    backdrop: 'static',
                    keyboard: false,
                }, 'show');
                $('#updateStaffDamages #employee_number').val(data[1]);
                $('#updateStaffDamages #employee_name').val(data[2]);
                $('#updateStaffDamages #date_issue').val(data[3]);
                $('#updateStaffDamages #damage_amount').val(data[4]);
                $('#updateStaffDamages #damage_amount_balance').val(data[5]);
                $('#updateStaffDamages #issue_name').val(data[6]);
            }
        });
    });

    $('#updateStaffDamages').on('submit', function(event){
        event.preventDefault();
        var Pay_Data = $(this).serialize();
        $.ajax({
            url: 'controller.php?action=update_staff_damages',
            type: 'POST',
            data: Pay_Data,
            success: function(){
                $('#updateStaffDamages')[0].reset();
                $('#update-damages-form').modal('hide');
                $('#staff-damages-table').DataTable().draw();
                $('#paid-staff-damages-table').DataTable().draw();
            }
        })
    });
    
    $("#holiday-pay-table").DataTable({
        serverSide: true,
        ajax: {
            url: "controller.php",
            type: "GET",
            data: {
                action: "listHolidayPay",
            },
            dataType: "json",
        },
        retrieve: true,
        dom: "ftipr",
        bAutoWidth: false,
        paging: true,
        lengthChange: false,
        ordering: false,
        bInfo: false,
        searching: true,
        bFilter: true,
        pageLength: 15,
        columnDefs: [
            {
                targets: [3],
                className: "td-actions text-center",
            },
        ],
    });

    Date.prototype.toDateInputValue = function () {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    };

    // set input date value with current date
    $("#holiday_date").val(new Date().toDateInputValue());

    $("#addHolidayPay").submit(function (event) {
        event.preventDefault();
        var holidayData = {
            holiday_name: $("#holiday_name").val(),
            holiday_date: $("#holiday_date").val(),
            holiday_pay_percent: $("#holiday_pay_percent").val(),
        };

        $.ajax({
            url: "controller.php?action=add_holiday_pay",
            type: "POST",
            data: holidayData,
            success: function (data) {
                $("#add-holiday-pay-form").modal("hide");
                $("#addHolidayPay")[0].reset();
                $("#holiday-pay-table").DataTable().draw();
            },
        });
    });

    $("#holiday-pay-table").on("click", ".delete", function () {
        var holidayID = $(this).attr("id");
        if (confirm("Are you sure you want to delete this Holiday Pay?")) {
            $.ajax({
                url: "controller.php",
                method: "GET",
                data: {
                    holiday_id: holidayID,
                    action: "delete_holiday_pay",
                },
                success: function () {
                    $("#holiday-pay-table").DataTable().draw();
                },
            });
        } else {
            return false;
        }
    });

    $("#holiday-pay-table").on("click", ".update", function () {
        var holidayID = $(this).attr("id");

        $.ajax({
            url: "controller.php",
            method: "GET",
            data: {
                holiday_id: holidayID,
                action: "get_holiday_pay",
            },
            dataType: "json",
            success: function (data) {
                $("#update-holiday-pay-form").modal(
                    {
                        backdrop: "static",
                        keyboard: false,
                    },
                    "show"
                );
                $("#update-holiday-pay-form #holiday_name").val(data[1]);
                $("#update-holiday-pay-form #holiday_date").val(data[2]);
                $("#update-holiday-pay-form #holiday_pay_percent").val(data[3]);
            },
        });
    });

    $("#updateHolidayPay").submit(function (event) {
        event.preventDefault();
        var Holiday_Data = {
            holiday_name: $("#updateHolidayPay #holiday_name").val(),
            holiday_date: $("#updateHolidayPay #holiday_date").val(),
            holiday_pay_percent: $(
                "#updateHolidayPay #holiday_pay_percent"
            ).val(),
        };
        $.ajax({
            type: "POST",
            url: "controller.php?action=update_holiday_pay",
            data: Holiday_Data,
            success: function (data) {
                $("#update-holiday-pay-form").modal("hide");
                $("#updateHolidayPay")[0].reset();
                $("#holiday-pay-table").DataTable().draw();
            },
        });
    });

    var dashboard = {
        initDashboardPageCharts: function () {
            dataDailySalesChart = {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                series: [
                    [12252, 100007, 752003, 152227, 211553, 105002, 210200],
                    [212252, 620007, 700003, 202227, 201553, 405002, 310200],
                ],
            };

            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 5,
                }),
                fullWidth: true,
                low: 0,
                showArea: true,
                chartPadding: {
                    top: 20,
                    right: 25,
                    bottom: 0,
                    left: 25,
                },
            };

            var DailyNetGrossPay = new Chartist.Line(
                "#dailySalesChart",
                dataDailySalesChart,
                optionsDailySalesChart
            );

            dashboard.startAnimationForLineChart(DailyNetGrossPay);

            var dataWebsiteViewsChart = {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                series: [
                    [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30],
                    [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30],
                    [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30],
                ],
            };
            var optionsWebsiteViewsChart = {
                stackBars: true,
                axisX: {
                    showGrid: false,
                },
                chartPadding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: -5,
                },
            };
            var responsiveOptions = [
                [
                    "screen and (max-width: 640px)",
                    {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function (value) {
                                return value[0];
                            },
                        },
                    },
                ],
            ];
            var AttendaceViewChart = Chartist.Bar(
                "#websiteViewsChart",
                dataWebsiteViewsChart,
                optionsWebsiteViewsChart,
                responsiveOptions
            ).on("draw", function (data) {
                if (data.type === "bar") {
                    data.element.attr({
                        style: "stroke-width: 20px",
                    });
                }
            });

            //start animation for the Emails Subscription Chart
            dashboard.startAnimationForBarChart(AttendaceViewChart);
        },

        startAnimationForLineChart: function (chart) {
            chart.on("draw", function (data) {
                if (data.type === "line" || data.type === "area") {
                    data.element.animate({
                        d: {
                            begin: 600,
                            dur: 700,
                            from: data.path
                                .clone()
                                .scale(1, 0)
                                .translate(0, data.chartRect.height())
                                .stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint,
                        },
                    });
                } else if (data.type === "point") {
                    seq++;
                    data.element.animate({
                        opacity: {
                            begin: seq * delays,
                            dur: durations,
                            from: 0,
                            to: 1,
                            easing: "ease",
                        },
                    });
                }
            });
            seq = 0;
        },

        startAnimationForBarChart: function (chart) {
            chart.on("draw", function (data) {
                if (data.type === "bar") {
                    seq2++;
                    data.element.animate({
                        opacity: {
                            begin: seq2*delays2,
                            dur: durations2,
                            from: 0,
                            to: 1,
                            easing: "ease",
                        },
                    });
                }
            });
            seq2 = 0;
        },
    };
    dashboard.initDashboardPageCharts();

    $(window).resize(function () {
        dashboard.initSidebarsCheck();
        // reset the seq for charts drawing animations
        seq = seq2 = 0;
        setTimeout(function () {
            dashboard.initDashboardPageCharts();
        }, 500);
    });

    $("#remove-employees").on("click", function () {
        $("#display-employee").toggle();
    });
    
    $('#paid-staffCA').on('click', function(){
        $('#display-paid-tbl-staffCA').toggle();
    });
    
    $('#paid-staffLoan').on('click', function(){
        $('#display-paid-staffLoan').toggle();
    });

    $('#paid-employee-misc').on('click', function(){
        $('#display-paid-employeeMisc').toggle();
    })

    $('#paid-staffDamages').on('click', function(){
        $('#display-paid-staffDamages').toggle();
    });


    $("#staffCA-btn").click(function () {
        $("#tbl-staffCA").show();
        $("#paid-tbl-staffCA").show();
        $("#tbl-loan").hide();
        $('#paid-tbl-loan').hide();
        $('#paid-tbl-damages').hide();
        $('#paid-tbl-employee-misc').hide();
        $("#tbl-damage").hide();
        $("#tbl-misc").hide();
        $("#page-title").html("Staff Cash Advance");
        $("#loan-btn").removeClass("btn-secondary");
        $("#loan-btn").addClass("btn-warning");
        $("#misc-btn").removeClass("btn-secondary");
        $("#misc-btn").addClass("btn-warning");
        $("#damage-btn").removeClass("btn-secondary");
        $("#damage-btn").addClass("btn-warning");
        $(this).removeClass("btn-warning");
        $(this).addClass("btn-secondary");
    });

    $("#loan-btn").click(function () {
        $("#tbl-loan").show();
        $('#paid-tbl-loan').show();
        $("#tbl-staffCA").hide();
        $('#paid-tbl-employee-misc').hide();
        $('#paid-tbl-damages').hide();
        $("#paid-tbl-staffCA").hide();
        $("#tbl-damage").hide();
        $("#tbl-misc").hide();
        $("#page-title").html("Loan Record");
        $("#staffCA-btn").removeClass("btn-secondary");
        $("#staffCA-btn").addClass("btn-warning");
        $("#misc-btn").removeClass("btn-secondary");
        $("#misc-btn").addClass("btn-warning");
        $("#damage-btn").removeClass("btn-secondary");
        $("#damage-btn").addClass("btn-warning");
        $(this).removeClass("btn-warning");
        $(this).addClass("btn-secondary");
    });

    $("#misc-btn").click(function () {
        $("#tbl-misc").show();
        $("#tbl-loan").hide();
        $("#tbl-staffCA").hide();
        $('#paid-tbl-loan').hide();
        $('#paid-tbl-damages').hide();
        $("#paid-tbl-staffCA").hide();
        $('#paid-tbl-employee-misc').show();
        $("#tbl-damage").hide();
        $("#page-title").html("Employee Miscellaneous");
        $("#staffCA-btn").removeClass("btn-secondary");
        $("#staffCA-btn").addClass("btn-warning");
        $("#loan-btn").removeClass("btn-secondary");
        $("#loan-btn").addClass("btn-warning");
        $("#damage-btn").removeClass("btn-secondary");
        $("#damage-btn").addClass("btn-warning");
        $(this).removeClass("btn-warning");
        $(this).addClass("btn-secondary");
    });

    $("#damage-btn").click(function () {
        $("#tbl-damage").show();
        $("#tbl-loan").hide();
        $('#paid-tbl-loan').hide();
        $("#paid-tbl-staffCA").hide();
        $('#paid-tbl-damages').show();
        $('#paid-tbl-employee-misc').hide();
        $("#tbl-staffCA").hide();
        $("#tbl-misc").hide();
        $("#page-title").html("Damages Record");
        $("#staffCA-btn").removeClass("btn-secondary");
        $("#staffCA-btn").addClass("btn-warning");
        $("#loan-btn").removeClass("btn-secondary");
        $("#loan-btn").addClass("btn-warning");
        $("#misc-btn").removeClass("btn-secondary");
        $("#misc-btn").addClass("btn-warning");
        $(this).removeClass("btn-warning");
        $(this).addClass("btn-secondary");
    });
});

const db = {
    0: ["Sly Bacalso", "employee"],
    1: ["Jeremiah Montebon", "employee"],
    2: ["Daniel Kiamco", "employee"],
    3: ["Daniel Kiaco", "employee"],
    4: ["Danie Kiamco", "employee"],
    5: ["Danel Kimco", "employee"],
    6: ["Daie Kiamco", "employee"],
    7: ["Daniel Kimc", "employee"],
    8: ["Dniel Kiaco", "employee"],
    9: ["Daiel Kiamo", "employee"],
    10: ["Danel Kiamco", "employee"],
    11: ["Danel Kiamco", "employee"],
    12: ["John Doe", "employee"],
};

function checkedBoxRemove(){
    let length=$('.checked_remove_employee').length,
        total_checked=0;   
    $('.checked_remove_employee').each(function(){
        if(this.checked){
            total_checked+=1;
        }
    });
    if(total_checked == length)
        $('#check_all').prop('checked', true);
    else
        $('#check_all').prop('checked', false);
}

function checkedBoxDelete(){
    let length=$('.checked_delete_employee').length,
        total_checked=0;
        
    $('.checked_delete_employee').each(function(){
        if(this.checked){
            total_checked+=1;
        }
    });
    if(total_checked == length)
        $('#check_all_removed').prop('checked', true);
    else
        $('#check_all_removed').prop('checked', false);
}

function searchDB(elem) {
    let selector = document.getElementById("selector");
    // Check if input is empty
    if (elem.value.trim() !== "") {
        elem.classList.add("dropdown"); // Add dropdown class (for the CSS border-radius)
        // If the selector div element does not exist, create it
        if (selector == null) {
            selector = document.createElement("div");
            selector.id = "selector";
            elem.parentNode.appendChild(selector);
            // Position it below the input element
            selector.style.left = elem.getBoundingClientRect().left + "px";
            selector.style.top = elem.getBoundingClientRect().bottom + "px";
            selector.style.width = elem.getBoundingClientRect().width + "px";
        }
        // Clear everything before new search
        selector.innerHTML = "";
        // Variable if result is empty
        let empty = true;
        for (let item in db) {
            // Join the db elements in one string
            let str = [
                item.toLowerCase(),
                db[item][0].toLowerCase(),
                db[item][1].toLowerCase(),
            ].join();

            // If exists, create an item (button)
            if (str.indexOf(elem.value.toLowerCase()) !== -1) {
                let opt = document.createElement("button");
                opt.setAttribute("onclick", "insertValue(this);");
                opt.innerHTML = db[item][0];
                selector.appendChild(opt);
                empty = false;
            }
        }
        // If result is empty, display a disabled button with text
        if (empty == true) {
            let opt = document.createElement("button");
            opt.disabled = true;
            opt.innerHTML = "No results";
            selector.appendChild(opt);
        }
        return true;
    }
    // Remove selector element if input is empty
    else {
        if (selector !== null) {
            selector.parentNode.removeChild(selector);
            elem.classList.remove("dropdown");
        }
    }
}

// Function to insert the selected item back to the input element
function insertValue(elem) {
    window.search.classList.remove("dropdown");
    window.search.value = elem.innerHTML;
    elem.parentNode.parentNode.removeChild(elem.parentNode);
}
