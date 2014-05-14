<?php require_once("php/includes/session.php"); ?>
<?php require_once("php/includes/db_connection.php"); ?>
<?php require_once("php/includes/functions.php"); ?>
<?php require_once("php/includes/validation_functions.php"); ?>
<?php require_once("medoo.php"); ?>

<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<?php
$username = "";
$m_amount = null;
$d_caloric = null;

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    if (empty($errors)) {
        // Attempt Login

        $username = $_POST["username"];
        $password = $_POST["password"];

        $found_admin = attempt_login($username, $password);

        if ($found_admin) {
            // Success
            // Mark user as logged in
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["username"];
            redirect_to("account.php");
        } else {
            // Failure
            $_SESSION["message"] = "Username/password not found.";
        }
    }
} else {
    // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>


<?php


if (isset($_POST['save'])) {

    $database = new medoo("campus_cafe");


    $m_amount = $_POST["m_amount"];
    $d_caloric = $_POST["d_caloric"];


    echo $m_amount;
    echo $d_caloric;


    $database->update("customers", array(
        "monthly_budget" => $m_amount,


    ), array(
        "username" => $_SESSION["username"]
    ));

    $database->update("customers", array(


        "daily_calories" => $d_caloric,

    ), array(
        "username" => $_SESSION["username"]
    ));


}
?>



<?php



if (isset($_POST['clear'])) {

    $database = new medoo("campus_cafe");

    $database->update("customers", array(
        "monthly_budget" => 0,

        "daily_calories" => 0,

    ), array(
        "username" => $_SESSION["username"]
    ));

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http
    - equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title> Account</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div id="templatemo_wrapper">

    <div id="templatemo_header">


        <div id="header_address">
            <strong> Quick Contact </strong>
            <br> 408 - 554 - 7804 </br>
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
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>


            <div class="cleaner_h30"></div>
            <?php if ($_SESSION["username"] == null) { ?>
                <div id="logoutdiv">

                    <h2>Login, please.</h2>


                    <div class="text_button2" id="btncreate"><a href="login.php">login</div>
                    <div class="text_button2" id="btncreate"><a href="registration.php">Not a member?</div>


                </div>
            <?php } else { ?>
                <h2> Welcome to the Smart food, <?php echo htmlentities($_SESSION["username"]); ?>.</h2>


                <!--                <div class="text_button2" id="btnlogout" ><a href="logout.php"> Log out</div>-->


                <div class="cleaner_h50"></div>

                <div id="tracking">

                    <h2> Budget and Nutritional Tracking </h2>

                    <form method="post">

                        <?php
                        $database = new medoo("campus_cafe");
//                        $remain_budget = $database->select("customers", "budget", array("username" => $_SESSION["username"]));
//                        $remain_calories = $database->select("customers", "calories", array("username" => $_SESSION["username"]));
//                        $data_m_budget = $database->select("customers", "monthly_budget", array("username" => $_SESSION["username"]));
//                        $data_d_calories = $database->select("customers", "daily_calories", array("username" => $_SESSION["username"]));

                        $remain_budget = $database->select("customers", "budget", ["username" => $_SESSION["username"]]);
                        $remain_calories = $database->select("customers", "calories", ["username" => $_SESSION["username"]]);
                        $data_m_budget = $database->select("customers", "monthly_budget", ["username" => $_SESSION["username"]]);
                        $data_d_calories = $database->select("customers", "daily_calories", ["username" => $_SESSION["username"]]);
                        ?>


                        <p> Money Spent Record: <?php echo $remain_budget[0] ?></p>

                        <p> Recent Calories Records : <?php echo $remain_calories[0] ?></p>

                        <p> Allocate Budget for This Month: <?php echo $data_m_budget[0] ?></p>

                        <p> Allocate Daily Caloires Limit: <?php echo $data_d_calories[0] ?></p>


                        <p>&nbsp;</p>

                        <p>
                            <label for="Monthly_Amount"> Allocate Budget for This Month:</label>
                            <input type="text" name="m_amount" id="txtMA" class="required input_field"/>
                        </p>

                        <div class="cleaner_h10"></div>

                        <p>
                            <label for="Daily_Caloric"> Allocate Daily Caloires Limit:</label>
                            <input type="text" name="d_caloric" id="txtDC" class="required input_field"/>
                        </p>


                        <div class="cleaner_h10"></div>

                        <div class="cleaner_h10"></div>

                        <input type="submit" name="save" value="save data" id="btncreate" class="text_button2"/>
                        <input type="submit" name="clear" value="reset data" id="btncreate" class="text_button2"/>


                    </form>


                </div>
            <?php } ?>
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
    <!--end of main-->
</div>
<!--end of wrapper-->

<div id="templatemo_footer_wrapper">

    <div id="templatemo_footer">

        Copyright © 2014 Leon & Bruce

    </div>
    <!--end of templatemo_footer-->
</div>

</body>
</html>