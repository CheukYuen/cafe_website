<?php require_once("php/includes/session.php"); ?>
<?php require_once("php/includes/db_connection.php"); ?>
<?php require_once("php/includes/functions.php"); ?>
<?php require_once("php/includes/validation_functions.php"); ?>
<?php require_once("medoo.php"); ?>



<!DOCTYPE html>
<html>
<body>


<p id="test"></p>
<script type="text/javascript">
</script>

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

</body>
</html>