<?php


if (!defined("IN_GAMECP_SALT58585")) {
    die("Hacking Attempt");
    exit;
    return;
}

// Regex
define('REGEX_USERNAME', '/^(^[a-zA-Z][a-zA-Z0-9]+)$/');
define('REGEX_PASSWORD', '/^([a-zA-Z0-9]+)$/');

// Table Definitions
define('TABLE_CONFIRM_EMAIL', 'gamecp_confirm_email');
define("TABLE_LUACCOUNT", "tbl_RFTestAccount");//register account lebih jelasnya buka aplikasi [SQL SERVER MANAGEMENT STUDIO] di bagian RF_User  