<?php


// Check if constants are not defined before defining them
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'feedback');
}

// Rest of your configuration code...



// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'feedback');

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connect->connect_error) {
    // echo "Connected successfully";
} else {
    die("Connection failed: " . $connect->connect_error);
}



?>
