<?php 
# Require the Important php
require_once "../../important.php";

# GET data action from URL
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

# Switch the case what action got from the URL to be performed in this controller module
switch($action){
    case 'logout':
        // destroy all sessions and cookies
        @session_destroy(); 
        setcookie("usr", "" ,time()-(60*60*24*7*30),"/", "","",TRUE);
        setcookie("username", "" ,time()-(60*60*24*7*30),"/", "","",TRUE);
        Page::redir("../index.php");
        break;

    case 'get_employee_name':
        getEmployeeName();
        break;

    # Staff cash advance parameter
    case 'listStaffCA':
        datatable_StaffCA();
        break;
    case 'listPaidStaffCA':
        datatable_PaidStaffCA();
        break;
    case 'add_staff_ca':
        add_StaffCA();
        break;
    case 'get_staff_ca':
        get_staffCA();
        break;
     case 'update_staff_ca':
        update_staffCA();
        break;

    # Staff loan parameter
    case 'listStaffLoan':
        datatable_StaffLoan();
        break;
    case 'listPaidStaffLoan';
        datatable_PaidStaffLoan();
        break;
    case 'add_staff_loan':
        add_StaffLoan();
        break;
    case 'get_staff_loan':
        get_staffLoan();
        break;
    case 'update_staff_loan':
        update_staffLoan();
        break;

    # Staff damages parameter
    case 'listStaffDamages':
        datatable_StaffDamages();
        break;
    case 'listPaidStaffDamages':
        datatable_PaidStaffDamages();
        break;
    case 'add_staff_damages':
        add_StaffDamages();
        break;
    case 'get_staff_damages':
        get_staffDamages();
        break;
    case 'update_staff_damages':
        update_staffDamages();
        break;

    # Employee Miscellaneous
    case 'listEmployeeMisc':
        datatable_EmployeeMisc();
        break;
    case 'listPaidEmployeeMisc':
        datatable_PaidEmployeeMisc();
        break;
    case 'add_employee_misc':
        # TODO
        break;
    case 'get_employee_misc':
        # TODO
        break;
    case 'update_employee_misc':
        # TODO
        break;
}


function getEmployeeName(){
    Employee::getDataName();
    return;
}

# Staff Cash Advance function
function datatable_StaffCA(){
    EmployeeCredits::fetchDataList('staff_ca');
    return;
}
function datatable_PaidStaffCA(){
    EmployeeCredits::fetchDataList('paid_staff_ca');
    return;
}
function add_StaffCA(){
    EmployeeCredits::add('staff_ca');
    return;
}
function get_staffCA(){
    EmployeeCredits::getData();
    return;
}
function update_staffCA(){
    EmployeeCredits::update('staff_ca');
    return;
}

# Staff Loan function
function datatable_StaffLoan(){
    EmployeeCredits::fetchDataList('staff_loan');
    return;
}

function datatable_PaidStaffLoan(){
    EmployeeCredits::fetchDataList('paid_staff_loan');
    return;
}
function add_StaffLoan(){
    EmployeeCredits::add('staff_loan');
    return;
}
function get_staffLoan(){
    EmployeeCredits::getData();
    return;
}
function update_staffLoan(){
    EmployeeCredits::update('staff_loan');
    return;
}

# Staff Damages function
function datatable_StaffDamages(){
    EmployeeCredits::fetchDataList('staff_damages');
    return;
}
function datatable_PaidStaffDamages(){
    EmployeeCredits::fetchDataList('paid_staff_damages');
    return;
}
function add_StaffDamages(){
    EmployeeCredits::add('staff_damages');
    return;
}
function get_staffDamages(){
    EmployeeCredits::getData();
    return;
}
function update_staffDamages(){
    EmployeeCredits::update('staff_damages');
    return;
}


# Employee Miscellaneous function
function datatable_EmployeeMisc(){
    EmployeeCredits::fetchDataList('employee_misc');
    return;
}
function datatable_PaidEmployeeMisc(){
    EmployeeCredits::fetchDataList('paid_employee_misc');
    return;
}
function add_EmployeeMisc(){
    # TODO
    return;
}
function get_EmployeeMisc(){
    # TODO
    return;
}
function update_EmployeeMisc(){
    # TODO 
    return;
}