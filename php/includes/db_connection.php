<?php
/**
 * Created by PhpStorm.
 * User: zlin
 * Date: 2014-04-15
 * Time: 21:30
 */

define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "19890226");
define("DB_NAME", "campus_cafe");

// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Test if connection succeeded
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
?>
