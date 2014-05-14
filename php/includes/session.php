<?php
/**
 * Created by PhpStorm.
 * User: zlin
 * Date: 2014-04-15
 * Time: 21:46
 */
session_start();

function message()
{
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        // clear message after use
        $_SESSION["message"] = null;

        return $output;
    }
}

function errors()
{
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // clear message after use
        $_SESSION["errors"] = null;

        return $errors;
    }
}



?>