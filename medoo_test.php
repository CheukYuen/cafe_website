<?php

require_once 'medoo.php';
/**
 * Created by PhpStorm.
 * User: zlin
 * Date: 4/23/14
 * Time: 7:27 PM
 */

$database = new medoo("campus_cafe");

print_r($database->info());

//$last_user_id = $database->insert("customers", array(
//    "username" => "foo",
//    "hashed_password" => "123"
//
//));


$remain_budget = $database-> select("customers", "budget");

//echo $remain_budget;
//print_r($remain_budget);
echo $remain_budget[0];


//$database->update("customers", array(
//    "calories" => 90,
//
//    "budget" => 19,
//
//
//), array(
//    "username" => "aaa"
//));

?>