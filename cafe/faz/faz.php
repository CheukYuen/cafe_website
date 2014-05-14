<?php require_once("../../php/includes/session.php"); ?>
<?php require_once("../../php/includes/db_connection.php"); ?>
<?php require_once("../../php/includes/functions.php"); ?>
<?php require_once("../../php/includes/validation_functions.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>cafe</title>
    <link href="../../templatemo_style.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<div id="templatemo_wrapper">

    <div id="templatemo_header">

        <div id="header_address">
            <strong>Quick Contact</strong><br/>
            408-554-7804
        </div>

    </div>
    <!-- end of header -->

    <div id="templatemo_middle">

        <div id="templatemo_banner">

            <h1>Campus Cafe<span>with the best food</span></h1>

        </div>

        <div id="templatemo_menu">

            <ul>
                <li><a href="../../index.html"> Home</a></li>
                <li><a href="../../login.php"> Login</a></li>
                <li><a href="../../account.php"> Account</a></li>
                <li><a href="../../cafe/cafe.html"> Cafe</a></li>
                <li><a href="../../shopping_cart.php"> View_Order</a></li>
                <li><a href="../../Forum.html"> Forum</a></li>
                <li><a href="../../Visualization.html"> Visualization</a></li>
            </ul>

        </div>
        <!-- end of templatemo_menu -->
    </div>


    <div id="templatemo_main">

        <div id="templatemo_content">

            <div class="image_wrapper2"><img src="faz.jpg" width="120" height="80" alt="faz"/></div>

            <div align="right" id="logindiv">
                <?php echo message(); ?>
                <?php echo form_errors($errors); ?>


                <?php if ($_SESSION["username"] == null) { ?>


                    <h2> Welcome to Faz Restaurant! </h2>
<!--                    <div class="text_button2" id="btncreate"><a href="../../login.php"> Sign In</div>-->

                    <div class="cleaner_h30"></div>

                <?php } else { ?>


                    <div id="logoutdiv">

                        <h2> Welcome to Faz Restaurant, <?php echo htmlentities($_SESSION["username"]); ?>.</h2>

                        <!--                        <div class="text_button2" id="btncreate"><a href="../../logout.php"> Sign Out</div>-->


                    </div>
                <?php } ?>

                <div class="cleaner_h50"></div>


            </div>


        </div>

        <form action="../../shopping_cart.php" method="post">
            <table width="100%" border="0" cellpadding="5px">
                <tr>
                    <td><span class="image_wrapper2"><img src="chicken.jpg" alt="chicken" width="150"
                                                          height="100"/></span></td>
                    <td><span class="image_wrapper2"><img src="rolledbeef.jpg" alt="rolledbeef" width="150"
                                                          height="100"/></span></td>
                    <td><span class="image_wrapper2"><img src="spanakopita.jpg" alt="spanakopita" width="150"
                                                          height="100"/></span></td>
                </tr>
                <tr>
                    <td valign="top" id="rFood"><strong>Chicken Linguine </strong></td>
                    <td valign="top" id="gFood"><strong>Rolled Beef Kabob</strong>
                    </td>
                    <td valign="top" id="vFood"><strong>Spanakopita</strong></td>
                </tr>
                <tr>
                    <td>$14.95</td>
                    <td>$12.95</td>
                    <td>$9.95</td>
                </tr>
                <tr>
                    <td><em>With mushrooms, garlic, sun-dried tomatoes in basil, cream sauce</em></td>
                    <td><em>Delicately seasoned ground beef</em></td>
                    <td><em>Spinach, feta and ricotta stuffed phyllo dough</em></td>
                </tr>
                <tr>
                    <td><p>&nbsp;</p>

                        <p>Calories: 280<br/>
                            Type: regular<br/>
                        </p></td>
                    <td><p>&nbsp;</p>

                        <p>Calories: 176<br/>
                            Type: gluten-free<br/>
                        </p></td>
                    <td><p>&nbsp;</p>

                        <p>Calories: 228<br/>
                            Type: vegan<br/>
                        </p></td>
                </tr>
                <tr>
                    <td>Quantity:
                        <input type="text" size="5" maxlength="3" id="chickenQTY" name="qty_linguine"
                               class="required input_field"/></td>
                    <td>Quantity:
                        <input type="text" size="5" maxlength="3" id="beefQTY" name="qty_kabob"
                               class="required input_field"/></td>
                    <td>Quantity:
                        <input type="text" size="5" maxlength="3" id="spanQTY" name= "qty_span"
                               class="required input_field"/></td>
                </tr>
            </table>
            <div id="submit">

                <input type="submit" name="order" value="Order" id="btncreate" class="text_button2"/>
                </a>
            </div>
    </div>

    </form>
    <div id="templatemo_content">

        <h2>Campus Cafe</h2>

        <ul class="templatemo_list">
            <li><a href="../../cafe/amber/amber.php"> Amber</a></li>
            <li><a href="../../cafe/cpk/cpk.php"> California Pizza Kitchen </a></li>
            <li><a href="../../cafe/faz/faz.php"> Faz Restaurant </a></li>
            <li><a href="../../cafe/padT/padT.php"> Pad Thai </a></li>
            <li><a href="../../cafe/truya/truya.php"> Truya Sushi </a></li>
        </ul>


    </div>
    <div id="templatemo_sidebar">


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