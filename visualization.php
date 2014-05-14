<?php require_once("php/includes/session.php"); ?>
<?php require_once("php/includes/db_connection.php"); ?>
<?php require_once("php/includes/functions.php"); ?>
<?php require_once("php/includes/validation_functions.php"); ?>
<?php require_once("medoo.php"); ?>

<?php error_reporting(E_ALL ^ E_NOTICE); ?>


<?php
$username = "";

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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http
    - equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title> visualization</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="templatemo_wrapper">

<div id="templatemo_header">


    <div id="header_address">
        <strong> Quick Contact </strong>
        <br>408 - 554 - 7804</br>
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
<!--end of middle-->

<div id="templatemo_main">

    <div id="templatemo_content">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>


        <?php if ($_SESSION["username"] == null) { ?>
            <h2>Login</h2>



            <div class="text_button2" id="btncreate"><a href="login.php">login, please!</div>


            <div class="cleaner_h30"></div>

        <?php } else { ?>


            <div id="logoutdiv">

                <h2> Welcome to the Smart food, <?php echo htmlentities($_SESSION["username"]); ?>.</h2>

                <h3>Caloric Information</h3>
                <script src="Chart.js"></script>
                <canvas id="calories" height="450" width="450"></canvas>
                <script>
                    <?php

                    $database = new medoo("campus_cafe");
                    $money_spent = $database->select("customers", "budget", array("username" => $_SESSION["username"]));
                    $calories_consumed = $database->select("customers", "calories", array("username" => $_SESSION["username"]));
                    $data_m_budget = $database->select("customers", "monthly_budget", array("username" => $_SESSION["username"]));
                    $data_m_calories = $database->select("customers", "daily_calories", array("username" => $_SESSION["username"]));
                    $json_cafe_sql = array('m' => $money_spent[0], 'c' => $calories_consumed[0], 'b' => $data_m_budget[0], 'l' => $data_m_calories[0]);
                    $json_cafe_data = json_encode($json_cafe_sql);
                    ?>

                    var json_js_cafe = <?=$json_cafe_data?>;


                    var pieData = [
                        {
                            value: 2000,
                            color: "#F38630"
                        },

                        {
                            value: 5000,
                            color: "#69D2E7"
                        }

                    ];

                    var total_calories = parseInt(json_js_cafe.b);
                    var consumed_calories = parseInt(json_js_cafe.m);
                    pieData[0].value = total_calories;
                    pieData[1].value = consumed_calories;
                    console.log(json_js_cafe.b);
                    console.log(json_js_cafe.m);

                    var myPie = new Chart(document.getElementById("calories").getContext("2d")).Pie(pieData);
                </script>


            </div>


            <div class="tables">
                <table border=1>
                    <tr>

                        <td>Remain Calories</td>
                        <td>Recent Calories</td>
                    </tr>
                    <tr>

                        <td><?php echo $data_m_calories[0] - $calories_consumed[0] ?></td>
                        <td><?php echo $calories_consumed[0] ?> </td>
                    </tr>
                    <tr>
                        <td>Orange</td>
                        <td>Cyan</td>
                    </tr>
                </table>
            </div>


            <div class="cleaner_h20"></div>


            <div id="logoutdiv">
                <h3>Food Expenditure</h3>
                <script src="Chart.js"></script>
                <canvas id="budget" height="450" width="450"></canvas>
                <script>
                    <?php

                       $database = new medoo("campus_cafe");
                       $money_spent = $database->select("customers", "budget", array("username" => $_SESSION["username"]));
                       $calories_consumed = $database->select("customers", "calories", array("username" => $_SESSION["username"]));
                       $data_m_budget = $database->select("customers", "monthly_budget", array("username" => $_SESSION["username"]));
                       $data_m_calories = $database->select("customers", "daily_calories", array("username" => $_SESSION["username"]));
                       $json_cafe_sql = array('m' => $money_spent[0], 'c' => $calories_consumed[0], 'b' => $data_m_budget[0], 'l' => $data_m_calories[0]);
                       $json_cafe_data = json_encode($json_cafe_sql);
                       ?>

                    var json_js_cafe = <?=$json_cafe_data?>;


                    var pieData = [
                        {
                            value: 2000,
                            color: "#E0E4CC"
                        },

                        {
                            value: 5000,
                            color: "#D4CCC5"
                        }

                    ];

                    var total_budget = parseInt(json_js_cafe.l);
                    var consumed_budget = parseInt(json_js_cafe.c);
                    pieData[0].value = total_budget;
                    pieData[1].value = consumed_budget;
                    console.log(json_js_cafe.l);
                    console.log(json_js_cafe.c);

                    var myPie = new Chart(document.getElementById("budget").getContext("2d")).Pie(pieData);
                </script>


            </div>
            <div class="tables">
                <table border=1>
                    <tr>

                        <td>Remain budget</td>
                        <td>money spent</td>
                    </tr>
                    <tr>

                        <td><?php echo $data_m_budget[0] - $money_spent[0] ?></td>
                        <td><?php echo $money_spent[0] ?> </td>
                    </tr>
                    <tr>
                        <td>Gray</td>
                        <td>white</td>
                    </tr>
                </table>
            </div>

        <?php } ?>
    </div>


    <div class="cleaner_h50"></div>


    <div id="templatemo_content">

        <h2> Delicious Foods </h2>

        <ul class="templatemo_list">
            <li><a href="cafe/amber/amber.php"> Amber</a></li>
            <li><a href="cafe/cpk/cpk.php"> California Pizza Kitchen </a></li>
            <li><a href="cafe/faz/faz.php"> Faz Restaurant </a></li>
            <li><a href="cafe/padT/padT.php"> Pad Thai </a></li>
            <li><a href="cafe/truya/truya.php"> Truya Sushi </a></li>
        </ul>
    </div>
    <div id="templatemo_sidebar">

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