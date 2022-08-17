<?php
require("../../functions/functions.php");
if (isset($_POST["submit"]))
{
session_start();
 $username=clean($_POST["username"]);
 $username=strtolower($username);
 $password=clean($_POST["password"]);
 $password=strtolower($password);
 $errors=[];
array_push($errors,validate_username($username,true));
array_push($errors,validate_pass($password,true));
if(!check_error($errors))
{    $_SESSION["errors"]=$errors;
    header("location:../Login.php");
    die;
}
$_SESSION["admin"]="";
header("location:../cover.php");
}
else
{
    header("location:../login.php");
}