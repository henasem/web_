<?php 

if (!defined("IN_GAMECP_SALT58585")) {
    die("Hacking Attempt");
    exit;
    return;
}

# set account admin 
$admin = array();
$admin['super_admin'] = ''; // masukkan username
$admin['allowed_ips'] = ''; // masukkan alamat ip address ( 127.0.0.1 ngak bisa)

# Get our list of possible ban reasons
$ban_reasons = array('Multiple Account Voting', 'Duper', 'PayPal Related', 'Insulting Players', 'Fraud', '3 Day Ban', 'Not obeying a GM', 'Crashing the server', 'Fraud Related', 'Multiple Account Warning', 'Misuse of Chat/Spamming', 'Miuse of Chat/Spamming more than Once', 'Glitching Guard Towers', 'Guard Towers in Core', 'Guard Tower "Port In" Location', 'Abusing Race Leader Powers', 'Safe Zone Debuffing/Healing', 'Animus Safe Zone Attacking', 'Glitching Animus', 'Disrespecting a GM', 'Scamming', 'Verbally Harassing a Player', 'Harassing a Play', 'Speed Hacking', 'Damage Hacking', 'Fly Hacking', 'Terrain Exploiting', 'Settlement/Wharf Tower Exploiting', 'Multiple use of Third Party Programs', 'Shooting Over Crag Mine Barricades', 'Multiple Rates Jades', 'Impersonating a GM', 'Using a Nuke in the Core', 'Real Money Trading(RMT)', 'Partying with a Cheater', 'PayPal Restrictions Bypass', 'Conspiracy', 'Aiding a hacker', "Account trading or sharing", "Auto-chat abuse", "Spamming in chat", "Trading in public chat", 'Non-English in public chat', 'Contact a GM regarding BAN', 'Piloting Accounts', 'TEMP');
sort($ban_reasons);
$reasons_count = @count($ban_reasons);

# Ban times
$banTimes = array(
    array('hours' => 2, 'title' => '2 Hours'),
    array('hours' => 3, 'title' => '3 Hours'),
    array('hours' => 4, 'title' => '4 Hours'),
    array('hours' => 12, 'title' => '12 Hours'),
    array('hours' => 24, 'title' => '1 Day'),
    array('hours' => 48, 'title' => '2 Days'),
    array('hours' => 72, 'title' => '3 Days'),
    array('hours' => 720, 'title' => '1 Month'),
    array('hours' => 119988, 'title' => 'Forever'),
);

# Built the "Log Types" array
$logTypes_array = array(
    "--- N/A ---",
    "GAMECP - CHANGE PASSWORD",
    "GAMECP - DONATE",
    "GAMECP - DELETE CHARACTER",
    "SUPPORT - USER INFO",
    "SUPPORT - LOG OUT LOGS",
    "ADMIN - MAIL LOGS",
    "ADMIN - CHAR LOOK UP",
    'ADMIN - DELETE CHARACTER',
    "PAYPAL - <b>REVERSED</b>",
    "PAYPAL - <b>CANCELED REVERSAL</b>",
    "PAYPAL - SUCCESSFUL PAYMENT",
    "PAYPAL - ADDED CREDITS",
    "PAYPAL - DUPLICATE TXN ID",
    "PAYPAL - INVALID BUSINESS",
    "PAYPAL - <b>INCOMPLETE</b>",
    "PAYPAL - PAYMENT INVALID",
    "PAYPAL - PAYMENT FAILED",
    "PAYPAL - Unable to connect to www.paypal.com",
    "GAMECP - PASSWORD RECOVERY",
    "GAMECP - ACCOUNT INFO",
    "ADMIN - ITEM EDIT",
    "ADMIN - BANK EDIT",
    "ADMIN - ITEM SEARCH",
    "ADMIN - ITEM LIST",
    'ADMIN - GIVE ITEM',
    'ADMIN - DELETE ITEM',
    "ADMIN - MANAGE BANS - ADDED",
    "ADMIN - MANAGE BANS - UPDATED",
    "ADMIN - MANAGE BANS - UNBAN",
    "ADMIN - CHARACTER EDIT",
    "SUPER ADMIN - PERMISSIONS",
    'SUPER ADMIN - CONFIG',
    'ADMIN - MANAGE USERS',
    'ADMIN - MANAGE ITEMS - UPDATED',
    'ADMIN - MANAGE ITEMS - ADDED',
    'ADMIN - MANAGE ITEMS - DELETED',
    'ADMIN - MANAGE CATEGORIES',
    'GAMECP - CHANGE CHAR NAME',
    'ADMIN - MANAGE REDEEM',
    'ADMIN - VOTE SITES',
    'GAMECP - ACCOUNT INFO - UPDATED SIG - PHP CODE FOUND'
);
sort($logTypes_array);

# Configurable Variables [DON'T TOUCH IF YOU DONT KNOW WHATS GOING ON!]
$dont_allow = array(".", "..", "index.html", "pagination", "library", "libchart", "gamecp_license.txt", "generated");

# Database Settings (BE ADVISED: MAKE NEW USERNAMES AND PASSWORDS FOR THE GAMECP, DO NOT USE YOUR MASTER)
$mssql = array();
$mssql['user']['host'] = 'DESKTOP-545R3BV\SQLEXPRESS';
$mssql['user']['db'] = 'RF_User';
$mssql['user']['username'] = 'sa';
$mssql['user']['password'] = '2ribuaja';

$mssql['data']['host'] = 'DESKTOP-545R3BV\SQLEXPRESS';
$mssql['data']['db'] = 'RF_World';
$mssql['data']['username'] = 'sa'; // If user has only 'read' access
$mssql['data']['password'] = '2ribuaja'; // Item Edit and Delete characters wont work

$mssql['gamecp']['host'] = 'DESKTOP-545R3BV\SQLEXPRESS';
$mssql['gamecp']['db'] = 'RF_GameCP';
$mssql['gamecp']['username'] = 'sa';
$mssql['gamecp']['password'] = '2ribuaja';

$mssql['items']['host'] = 'DESKTOP-545R3BV\SQLEXPRESS';
$mssql['items']['db'] = 'RF_ItemsDB';
$mssql['items']['username'] = 'sa';
$mssql['items']['password'] = '2ribuaja';