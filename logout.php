<?php require_once("php/includes/session.php"); ?>
<?php require_once("php/includes/functions.php"); ?>




<?php
/**
 * Created by PhpStorm.
 * User: zlin
 * Date: 2014-04-16
 * Time: 18:24
 */


$_SESSION["admin_id"] = null;
$_SESSION["username"] = null;
redirect_to("account.php");
?>