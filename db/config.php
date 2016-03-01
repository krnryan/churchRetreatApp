<?php
    // Connects to localhost DB
    date_default_timezone_set("America/Los_Angeles");
    define('TZ_TO_UTC', 'PT8H');
    define('DBNAME', 'chung3syh');
    define('DBUSER', 'root');
    define('DBPASSWD', 'root');
    define('DBHOST', 'localhost');
    $con = mysqli_connect(DBHOST, DBUSER, DBPASSWD, DBNAME);
    $con->query("SET NAMES 'UTF8'");
    if (!$con) {
        echo "ERROR : could not connect to db";
        exit(0);
    }
?>
