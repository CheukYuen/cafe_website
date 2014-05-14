<?php require_once("php/includes/session.php"); ?>
<?php require_once("php/includes/db_connection.php"); ?>
<?php require_once("php/includes/functions.php"); ?>
<?php require_once("php/includes/validation_functions.php"); ?>


<?php
if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $username = mysql_prep($_POST["username"]);
        // $hashed_password = mysql_prep($_POST["password"]);
        $hashed_password = password_encrypt($_POST["password"]);

        $query = "INSERT INTO customers (";
        $query .= "  username, hashed_password";
        $query .= ") VALUES (";
        $query .= "  '{$username}', '{$hashed_password}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["message"] = "Admin created.";
            redirect_to("login.php");
        } else {
            // Failure
            $_SESSION["message"] = "Admin creation failed.";
        }
    }
} else {
    // This is probably a GET request

} // end: if (isset($_POST['submit']))
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http
    - equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title> registration</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css"/>


<div id="templatemo_wrapper">

    <div id="templatemo_header">


        <div id="header_address">
            <strong> Quick Contact </strong><br/>
            408 - 554 - 7804
        </div>

    </div>
    <!--end of header-->

    <div id="templatemo_middle">

        <div id="templatemo_banner">

            <h1> Campus Cafe <span>with the best food </span></h1>

        </div>

        <div id="templatemo_menu">

            <ul>
                <li><a href="index.html"> Home</a></li>
                <li><a href="login.php"> Login</a></li>
                <li><a href="account.php"> Account</a></li>
                <li><a href="cafe/cafe.html"> Cafe</a></li>
                <li><a href="shopping_cart.php">Shopping_cart</a></li>
                <li><a href="Forum.html"> Forum</a></li>
                <li><a href="visualization.php"> Visualization</a></li>
            </ul>

        </div>
        <!--end of templatemo_menu-->

    </div>

    <div id="templatemo_main">

        <div id="contact_form">

            <h2> Registration</h2>

            <form action="registration.php" method="post">
                <p>Username:
                    <input type="text" name="username" value="" class="required input_field"/>
                </p>

                <p>Password:
                    <input type="password" name="password" value="" class="required input_field"/>
                </p>
                <input type="submit" name="submit" value="Create Admin" id="btncreate" class="text_button2"/>
            </form>


            <div class="cleaner_h30"></div>

            <div class="cleaner_h50"></div>


        </div>

        <div id="templatemo_sidebar">

            <h2> Delicious Foods </h2>

            <ul class="templatemo_list">
                <li><a href="cafe/amber/amber.php"> Amber</a></li>
                <li><a href="cafe/cpk/cpk.php"> California Pizza Kitchen </a></li>
                <li><a href="cafe/faz/faz.php"> Faz Restaurant </a></li>
                <li><a href="cafe/padT/padT.php"> Pad Thai </a></li>
                <li><a href="cafe/truya/truya.php"> Truya Sushi </a></li>
            </ul>


            <div class="cleaner_h40"></div>

            <h5> Cafe Map </h5>

            <div class="image_wrapper fl_img">
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps/ms?msa=0&amp;msid=217351135929404303904.0004cf60aaf7441e23741&amp;hl=en&amp;ie=UTF8&amp;t=t&amp;z=15&amp;output=embed"></iframe>
                <br/>
                <small> View <a
                        href="https://maps.google.com/maps/ms?msa=0&amp;msid=217351135929404303904.0004cf60aaf7441e23741&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;z=17&amp;source=embed"
                        style="color:#0000FF;text-align:left"> Campus Food </a> in a larger map
                </small>
                </a ></div>

        </div>

        <div class="cleaner"></div>
    </div>

</div>
<!--end of wrapper-->

<div id="templatemo_footer_wrapper">

    <div id="templatemo_footer">

        Copyright © 2014 Leon & Bruce

    </div>
    <!--end of templatemo_footer-->
</div>

</body >
</html>