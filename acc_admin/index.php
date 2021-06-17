<?php
require_once "../important.php";

if (!Account::loggedIn()) {
    Page::redir("../index.php");
} else {
    Page::redir("dashboard/");
}

require_once("page.php");
?>
