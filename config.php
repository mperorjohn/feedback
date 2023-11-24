<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'feedback');

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connect->connect_error) {
    // echo "Connected successfully";
} else {
    die("Connection failed: " . $connect->connect_error);
}

?>
