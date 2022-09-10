<?php

if (!defined("IN_GAMECP_SALT58585")) {
    die("Hacking Attempt");
    exit;
    return;
}

# set content header
header('Content-Type: text/html; charset=utf-8');

# define common initated
define("COMMON_INITIATED", true);

# required globally
$base_path = dirname(__FILE__);

# mboh opo iki!!!
function quick_msg($message, $type = 'error')
{

?>

<head>
    <title>Game Control Panel v2</title>
    <style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        background-color: #f7f7f7;
        margin: 50px;
        padding: 20px;
    }

    a {
        color: #580000;
        text-decoration: none;
    }

    a:hover {
        color: #c76e0f;
    }

    .info,
    .success,
    .warning,
    .error,
    .validation {
        border: 1px solid;
        margin: 10px 0px;
        padding: 15px 10px 15px 50px;
        background-repeat: no-repeat;
        background-position: 10px center;
    }

    .info {
        color: #00529B;
        background-color: #bde5f8;
        background-image: url('./includes/images/knobs/info.png');
    }

    .success {
        color: #4f8a10;
        background-color: #dff2bf;
        background-image: url('./includes/images/knobs/success.png');
    }

    .warning {
        color: #9f6000;
        background-color: #feefb3;
        background-image: url('./includes/images/knobs/warning.png');
    }

    .error {
        color: #d8000c;
        background-color: #ffbaba;
        background-image: url('./includes/images/knobs/error.png');
    }
    </style>
</head>

<body>
    <h2>RF Online Game Control Panel</h2>
    <?php echo '<div class="' . $type . '">' . $message . '</div>'; ?>
    <div><small>Copyright &copy; <a href="#">Control Panel Web</a></small></div>
</body>

</html>
<?php

    exit(1);
}

# check to see if we have setup or stuff
if (!file_exists('./includes/main/config.php')) {
    quick_msg("Please go into includes/main/config.php");
}

# Check to see if we our definition file
if (!file_exists('./includes/main/definitions.php')) {
    quick_msg("Please go into includes/main/definitions.php.", 'warning');
}

# Well, we really cannot do anything is MSSQL is not installed :(
if (@phpversion() >= '5.3.0' && strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    if (extension_loaded('sqlsrv')) {
        include "./includes/main/mssql_to_sqlsrv.php";
    } elseif (!extension_loaded('mssql')) {
        quick_msg("Your server, running PHP 5.3+ does not have the SQLSRV module loaded OR the MSSQL module loaded");
    }
} else {
    if (!function_exists('mssql_connect')) {
        quick_msg("Your server does not have the MSSQL module loaded with PHP");
    }
}

# Make sure we can read/write to our cache directory
if (!is_dir('./includes/cache/')) {
    quick_msg("Woops! Please create the cache folder");
}

# Make sure
if (!is_writable('./includes/cache')) {
    quick_msg("Woops! It looks like I cannot read/write to the /includes/cache/ folder. Make sure I have the right permissions");
}

# I'm going to do some variable checking and fixing
# Seems that some web servers don't provide soem key varaibles! REQUEST_URI and DOCUMENT_ROOT? Seriously
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/' . substr($_SERVER['PHP_SELF'], 1);

    if (isset($_SERVER['QUERY_STRING']) AND $_SERVER['QUERY_STRING'] != "") {
        $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
    }
}

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    if (isset($_SERVER['SCRIPT_FILENAME'])) {
        $_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen($_SERVER['PHP_SELF'])));
    }
}

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    if (isset($_SERVER['PATH_TRANSLATED'])) {
        $_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0 - strlen($_SERVER['PHP_SELF'])));
    }
}