<?php require_once("medoo.php"); ?>
<?php
session_start();
if (isset($_POST['order'])) {
    //$_SESSION['quantity'] = array();
    foreach ($_POST AS $key => $value) {
        if (strpos($key, 'qty_') === 0) {
            $_SESSION['quantity'][substr($key, 4)] = $value;
        }
    }


}

if (isset($_POST['cancel'])) {
//    $_SESSION = array();
//    $_SESSION = array();
//    $_SESSION = array();
//    session_destroy();
    $_SESSION['quantity'] = null;
}

$price = array(
    'channa' => 12.95,
    'mizauna' => 7.50,
    'mushroom' => 9.95,
    'quinoa' => 14.95,
    'chicken' => 12.95,
    'cedar' => 21.95,
    'linguine' => 14.95,
    'kabob' => 12.95,
    'span' => 9.95,
    'green' => 11.95,
    'spicy' => 10.95,
    'yellow' => 11.95,
    'sushi' => 13.95,
    'tofu' => 8.95,
    'yak' => 10.95,
);

$calories = array(
    'channa' => 500,
    'mizauna' => 350,
    'mushroom' => 260,
    'quinoa' => 610,
    'chicken' => 900,
    'cedar' => 640,
    'linguine' => 280,
    'kabob' => 176,
    'span' => 228,
    'green' => 375,
    'spicy' => 300,
    'yellow' => 390,
    'sushi' => 700,
    'tofu' => 210,
    'yak' => 360,

);


$_SESSION['total'] = 0;
$_SESSION['total_cal'] = 0;




?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>cart</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div id="templatemo_wrapper">

<div id="templatemo_header">


    <div id="header_address">
        <strong>Quick Contact</strong>
        <br>408 - 554 - 7804</br>
    </div>

</div>
<!-- end of header -->

<div id="templatemo_middle">

    <div id="templatemo_banner">

        <h1>Campus Cafe<span>with the best food</span></h1>

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
    <!-- end of templatemo_menu -->

</div>

<div id="templatemo_main">

    <div id="templatemo_content">


        <div class="cleaner_h10"></div>
        <div class="cleaner_h10"></div>
        <div class="cleaner_h10"></div>


        <div class="cleaner_h10"></div>

        <p><strong>Your Cart:</strong></p>

        <?php if (!isset($_SESSION['quantity']) || array_sum($_SESSION['quantity']) === 0) { ?>
            <h3>Your basket is empty.</h3>
        <?php } else { ?>


            <p><em>FREE Shipping on orders over $25.00!</em></p>



            <select id="dOptions">
                <option value="Building1">Building 1</option>
                <option value="Building2">Building 2</option>
                <option value="Building3">Building 3</option>
                <option value="Building4">Building 4</option>
                <option value="Building5">Building 5</option>
                <option value="Building6">Building 6</option>
                <option value="Building7">Building 7</option>
                <option value="Building8">Building 8</option>
                <option value="Building9">Building 9</option>
                <option value="Building10">Building 10</option>
            </select>




            <table width="100%" border="0" cellpadding="7px">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Caloric</th>
                    <th>Item Price</th>

                </tr>
                <?php foreach ($_SESSION['quantity'] AS $foodname => $amount):
                    if ($amount > 0) :
                        ?>

                        <tr>
                            <td><?php echo $foodname; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $cost_cal = $amount * $calories[$foodname];
                                $_SESSION['total_cal'] += $cost_cal;
                                ?>
                            </td>
                            <td>$<?php  $cost = $amount * $price[$foodname];
                                $cost = round($cost);
                                $_SESSION['total'] += $cost;
                                echo $cost; ?>
                            </td>
                        </tr>
                    <?php
                    endif;
                endforeach; ?>

                <tr>
                    <td id="item1"></td>
                    <td id="qty1"></td>
                    <td id="cal1"></td>
                    <td id="price1"></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>Total Calories</strong></td>
                    <td id="totalC"><?php echo $_SESSION['total_cal'] ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>SubTotal</strong></td>
                    <td id="sub"><?php echo $_SESSION['total']; ?></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>Tax (8.25%)</strong></td>
                    <td id="tax">$<?php echo $_SESSION['total'] * 0.0825; ?></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>Delivery</strong></td>
                    <td id="dorp"><?php
                        if ($_SESSION['total'] < 25) {
                            echo '$3';
                            $_SESSION['total'] += 3;
                        } else {
                            echo 'FREE';
                        }
                        ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>Total</strong></td>
                    <td id="totalAmount">$<?php $_SESSION['total'] = $_SESSION['total'] * 1.0825;
                        $_SESSION['total'] = round($_SESSION['total']);
                        echo $_SESSION['total'];?></td>
                </tr>

            </table>

            <div class="cleaner_h60"></div>

            <form method="post">
                <input class="text_button2 " value="Cancel Order" name="cancel"
                       type="submit">
                <!--                <span><input class="text_button2 " value="Confirm Order" type="submit" ></span>-->
                <div class="text_button2" id="btnorder"><a href="confirmation.php"> confirm</a></div>

            </form>
        <?php } ?>

    </div>


    <div id="templatemo_sidebar">

        <h2>Delicious Foods</h2>

        <ul class="templatemo_list">
            <li><a href="cafe/amber/amber.php"> Amber</a></li>
            <li><a href="cafe/cpk/cpk.php"> California Pizza Kitchen </a></li>
            <li><a href="cafe/faz/faz.php"> Faz Restaurant </a></li>
            <li><a href="cafe/padT/padT.php"> Pad Thai </a></li>
            <li><a href="cafe/truya/truya.php"> Truya Sushi </a></li>
        </ul>


        <div class="cleaner_h40"></div>

        <h5>Cafe Map</h5>

        <div class="image_wrapper fl_img">
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps/ms?msa=0&amp;msid=217351135929404303904.0004cf60aaf7441e23741&amp;hl=en&amp;ie=UTF8&amp;t=t&amp;z=15&amp;output=embed"></iframe>
            <br/>
            <small>View <a
                    href="https://maps.google.com/maps/ms?msa=0&amp;msid=217351135929404303904.0004cf60aaf7441e23741&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;z=17&amp;source=embed"
                    style="color:#0000FF;text-align:left">Campus Food</a> in a larger map
            </small>
            </a></div>

    </div>

    <div class="cleaner"></div>

</div>
<!--end of main-->

</div>


<!-- end of wrapper -->

<div id="templatemo_footer_wrapper">

    <div id="templatemo_footer">

        Copyright © 2014 Leon & Bruce

    </div>
    <!-- end of templatemo_footer -->
</div>

</body>
</html>